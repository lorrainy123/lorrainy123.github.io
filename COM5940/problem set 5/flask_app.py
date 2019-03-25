from flask import Flask, render_template, request, json, redirect, session
from flask import Markup
from flask_login import LoginManager, login_user, logout_user, login_required, UserMixin
import requests

app = Flask(__name__)
app.config["DEBUG"] = False
app.config['SECRET_KEY'] = "JutzX21JOBqOdxlCV8xqqnxD"
login_manager = LoginManager()
login_manager.init_app(app)
login_manager.login_view = 'login'

@login_manager.user_loader
def load_user(user_id):
    return User(user_id)

class User(UserMixin):
  def __init__(self,id):
    self.id = id

@app.route("/")
@login_required
def home():
    return render_template('index.html')


@app.route("/table")
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

@app.route("/login")
def login():
    message = 'Please login in first.'
    return render_template('login.html', message=message)

@app.route("/process",methods=['POST'])
def process():
    username = request.form['username']
    password = request.form['password']
    if  password == 'password':
        login_user(User(1))
        message = "Dear " + username + ", welcome to Lorraine's pages. Your login has been granted."
        return render_template('index.html', message=message)
    message = 'wrong password!'
    return render_template('login.html',message=message)

@app.route('/logout/')
@login_required
def logout():
    logout_user()
    message = 'Thanks for logging out.'
    return render_template('login.html',message=message)

if __name__ == '__main__':
   app.run(debug = True)
