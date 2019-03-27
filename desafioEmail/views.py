from django.shortcuts import render
from django.http import HttpResponse
import matplotlib.pyplot
import pandas as pd
import re

# Create your views here.

def index(request):
    return render(request, 'index.html')


def lerArquivos(request):
    dominios = 'C:/xampp/htdocs/desafio_emails/domain_list.csv'
    emails = 'C:/xampp/htdocs/desafio_emails/email_list.csv'

    dadosDominios = []
    novoDadosDominios = []

    lista_dominios = pd.read_csv(dominios, names=['Domain'])
    lista_emails = pd.read_csv(emails, names=["E-mails"])

    if request != "":
        total = lista_emails.shape[0]
        lista_emails.loc[total + 1] = request

    for (i, row) in lista_dominios.itertuples():
        dadosDominios.append(row)

    for x in dadosDominios:
        item = x
        for y in ["'"]:
            item = item.replace(y, "")
        novoDadosDominios.append(item)

    listEmailCerto = []
    listEmailErrado = []
    for (i, row) in lista_emails.itertuples():
        resultado = lista_emails['E-mails'][i].split("@")
        result = resultado[1].split("'")
        email = lista_emails['E-mails'][i]

        if result[0] in novoDadosDominios:
            listEmailCerto.append(email)
        else:
            listEmailErrado.append(email)

    corrigidos = []
    for i in listEmailErrado:
        resultadoErrado = i.split("@")
        resultErrado = resultadoErrado[1].split("'")
        for j in novoDadosDominios:
            if re.search(resultErrado[0], j, re.IGNORECASE):
                if re.search(resultErrado[0], "br") or re.search(resultErrado[0], "mx") or re.search(resultErrado[0], "ar"):
                    resultErrado[0] = j
                    corrigidos.append(resultadoErrado[0] + '@' + resultErrado[0] + "'")
                else:
                    corrigidos.append(resultadoErrado[0] + '@' + j + "'")

    gmail = []
    hotmail = []
    hotmailBr = []
    hotmailMX = []
    hotmailAr = []
    msn = []

    for corrigido in corrigidos:
        if re.search('gmail.com', corrigido):
            gmail.append(corrigido)
        elif re.search('hotmail.com.br', corrigido):
            hotmailBr.append(corrigido)
        elif re.search('hotmail.com.mx', corrigido):
            hotmailMX.append(corrigido)
        elif re.search('hotmail.com.ar', corrigido):
            hotmailAr.append(corrigido)
        elif re.search('msn', corrigido):
            msn.append(corrigido)
        else:
            hotmail.append(corrigido)

    domains = ['Gmail', 'Hotmail', 'HotmailBr', 'HotmailMx', 'HotmailAr', 'Msn']
    countDomains = [len(gmail),  len(hotmail), len(hotmailBr), len(hotmailMX), len(hotmailAr), len(msn)]
    descricaoX = 'Domínios'
    descricaoY = 'Quantidades de erros de escrita'


    plotarGraficos(domains, countDomains, descricaoX, descricaoY)
    #return corrigidos

def plotarGraficos(x, y, xLbael, yLabel):
    matplotlib.pyplot.plot(x, y)
    matplotlib.pyplot.xlabel(xLbael)
    matplotlib.pyplot.ylabel(yLabel)
    matplotlib.pyplot.show()

def adicionarEmail(request):
    if request.method == 'POST':
        getEmail = request.POST['email']
        results = lerArquivos(getEmail)

    return render(request, 'resultados.html',{'results' : results})


lerArquivos('slrocha@gmail.com')
