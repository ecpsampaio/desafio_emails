from django.shortcuts import render
from django.http import HttpResponse
import pandas as pd
import csv


# Create your views here.

def index(request):
    return render(request, 'index.html')


def lerArquivos(self):
    dominios = '../domain_list.csv'
    emails = '../email_list.csv'

    dados = []
    novoDados = []

    lista_dominios = pd.read_csv(dominios, names=['Domain'])
    lista_emails = pd.read_csv(emails, names=["E-mails"])

    for (i, row) in lista_dominios.itertuples():
        dados.append(row)

    for x in dados:
        item = x
        for y in ["'"]:
            item = item.replace(y, "")
        novoDados.append(item)

    listEmailCerto = []
    listEmailErrado = []
    for (i, row) in lista_emails.itertuples():
        resultado = lista_emails['E-mails'][i].split("@")
        result = resultado[1].split("'")
        email = lista_emails['E-mails'][i]

        if result[0] in novoDados:
            print(email)
            print("certo")
            listEmailCerto.append(email)
        else:
            print("errado")
            print(email)
            listEmailErrado.append(email)


    return HttpResponse(lista_dominios.values)


def adicionarEmail(request):
    if request.method == 'POST':
        getEmail = request.POST['email']

    return HttpResponse(getEmail)


lerArquivos(0)
