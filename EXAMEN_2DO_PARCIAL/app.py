#LIBRERIAS
from flask import Flask,render_template, request,url_for, flash, redirect
from flask_mysqldb import MySQL

#CREAR APLICACION
app = Flask(__name__)

app.config["TEMPLATES_AUTO_RELOAD"] = True


#CONEXION A MYSQL
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MTSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'crud_albums'

app.secret_key = 'mysecretkey'
mysql = MySQL(app)


#RUTA PRINCIPAL= READ
@app.route('/')
def index():
    con = mysql.connection.cursor()
    con.execute('SELECT * FROM tb_albums')
    conAlbums = con.fetchall()
    print(conAlbums)
    return render_template('index.html', listAlbums=conAlbums)

#EJECUTAR APLICACIÓN
if __name__ == '__main__':
    app.run(debug=True)

#RUTA EDITAR
@app.route('/editar/<int_id>')
def editar(id):
    
    con = mysql.connection.cursor()
    con.execute('SELECT * FROM tb_albums WHERE id=%s', (id,))
    consultarId = con.fetchone()
    con.close()
    return render_template('editarAlbum.html', Album=consultarId)

#RUTA GUARDAR
@app.route('/guardar', methods=['POST'])
def guardar():
    if request.method == 'POST':
        titulo = request.form['txtTitulo']
        descripcion = request.form['txtDesc']
        fecha = request.form['txtFecha']
        prioridad = request.form['txtPrioridad']
        estado = request.form['txtEstado']
        print(titulo,descripcion,fecha,prioridad,estado)

        """ CONEXIÓN DE LA BD Y EJECUCIÍN DEL INSERT """
        con = mysql.connection.cursor()
        con.execute('INSERT INTO tb_albums(titulo,descripcion,fecha,prioridad,estado) VALUES(%s,%s,%s,%s,%s)',(titulo,descripcion,fecha,prioridad,estado))
        mysql.connection.commit()

    flash('El album fue agregado correctamente!')
    return redirect(url_for('index'))