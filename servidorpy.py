import flask
import os

app = flask.Flask("Pratica 0")
port = int(os.getenv("PORT", 9099))

@app.route('/nome',methods=['GET'])
def mostrar_nome():
	return "Felipe/n"

app.run(host='localhost',port=port) 