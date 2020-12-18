import pymysql #conexión con base
import datetime
from datetime import timedelta



# Abre conexion con la base de datos
db = pymysql.connect("localhost", "root", "", "php_login_database")


# prepare a cursor object using cursor() method
cursor = db.cursor()

# Prepare SQL query to READ a record into the database.
sql = "SELECT dosis, dosisindicada, fechareceta FROM pacientes".format(0)
# Execute the SQL command
cursor.execute(sql)

# Fetch all the rows in a list of lists.
results = cursor.fetchall()
#xxxxxxxxxxxxxxxxxxxxxxx
print(results)
b = list(sum(results,()))


#prueba extrayendo listas individuales
sqldosis = "SELECT dosis FROM pacientes".format(0)
cursor.execute(sqldosis)
sqldosis0 = cursor.fetchall() #limpia y convierte en lista de pacientes
sqldosis1 = []
for t in sqldosis0:
       for x in t:
           sqldosis1.append(x)


sqldosisindicada = "SELECT dosisindicada FROM pacientes".format(0)
cursor.execute(sqldosisindicada)
sqldosisindicada0 = cursor.fetchall() 
sqldosisindicada1 = [] #limpia y convierte en lista la dosis indicada
for t in sqldosisindicada0:
       for x in t:
           sqldosisindicada1.append(x)
        
sqlfechareceta = "SELECT fechareceta FROM pacientes".format(0)
cursor.execute(sqlfechareceta)
sqlfechareceta0 = cursor.fetchall() 

sqlfechareceta1 = [] #limpia y convierte en lista la fecha de la receta
for t in sqlfechareceta0:
       for x in t:
           sqlfechareceta1.append(x)
        
db.close() #no olvidar cerrar la base de datos


    
quedamed = [] #días que quedan de medicación 
for i,w in enumerate(sqldosis1):
    quedamed.append(round(sqldosis1[i] / sqldosisindicada1[i])) #redondeo de dosis
   

hoy = date.today() #día de hoy
print(hoy)

hoyyreceta = []
for n in sqlfechareceta1: #distancia de días entre hoy y la fecha de la receta (devuelve tipo fecha)
    hoyyreceta.append(hoy - n)
print("----------------------------",hoyyreceta)

diasint = [d.days for d in hoyyreceta] #conversion de lista de dias a lista de enteros




calculo =  [] 
for i,w in enumerate(dias): #dias con medicación: si está negativo significa que se acabó
    calculo.append(round(diasint[i] - quedamed[i]))
print("print papa:::::::::::", calculo)


db = pymysql.connect("localhost", "root", "", "php_login_database")

cursor = db.cursor()

sql="INSERT into operatoria(op) values (%s)"

cursor.execute(sql, queda)