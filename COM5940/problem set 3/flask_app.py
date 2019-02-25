from flask import Flask, render_template, json, request
from flask import Markup
import requests

app = Flask(__name__)
app.config["DEBUG"] = False


@app.route("/")
def chart():

    r = requests.get('https://api.airtable.com/v0/appMMQw2GFHd4gPq4/total?api_key=keyoBP8I4GOGpxbjZ')
    dict1 = r.json()
    dict2 = {}
    dataset = []
    name_list = []
    total_entries_list = []
    for i in dict1['records']:
         dict2 = i['fields']
         dataset.append(dict2)
    for item in dataset:
        name_list.append(item.get('Name'))
        total_entries_list.append(item.get('Cred'))
    return render_template('index.html', entries = zip(name_list, total_entries_list))

@app.route("/chart")
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
