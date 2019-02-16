from flask import Flask, render_template, json, request
from flask import Markup
import requests

app = Flask(__name__)
app.config["DEBUG"] = False

@app.route("/")
def index():
    headers = {
        'Authorization': 'Bearer keyoBP8I4GOGpxbjZ',
    }

    params = (
        ('maxRecords', '100'),
        ('view', 'Grid view'),
    )

    r = requests.get('https://api.airtable.com/v0/appGx50X2ufc701eq/Imported%20table?api_key=keyoBP8I4GOGpxbjZ')
    dict = r.json()
    dataset = []
    for i in dict['records']:
            dict = i['fields']
            dataset.append(dict)
    return render_template('index.html', entries=dataset, title='Home Page')

