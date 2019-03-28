from django.shortcuts import render
from django.http import HttpResponse
import matplotlib.pyplot as plt
import pandas as pd
import re

# Create your views here.

def index(request):
    return render(request, 'index.html')


def lerArquivos(request):
    emailAdicionado = request
    dominios = 'C:/xampp/htdocs/desafio_emails/domain_list.csv'
    emails = 'C:/xampp/htdocs/desafio_emails/email_list.csv'

    dadosDominios = []
    novoDadosDominios = []

    lista_dominios = pd.read_csv(dominios, names=['Domain'])
    lista_emails = pd.read_csv(emails, names=["E-mails"])
    total = lista_emails.shape[0]

    if request != "":
        lista_emails.loc[total+1] = request

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

    totalErrados = len(listEmailErrado)
    totalCertos = len(listEmailCerto)
    corrigidos = []
    for i in listEmailErrado:
        resultadoErrado = i.split("@")
        resultErrado = resultadoErrado[1].split("'")
        for j in novoDadosDominios:
            if re.search(resultErrado[0], j):
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
    dictErrado = {}
    dictCerto ={}
    contCerto = 0
    contErrado = 0

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
        login = corrigido.split("@")
        loginFinal = login[0].split("'")
        tamLogin = len(loginFinal[1])
        dictErrado[contErrado] = tamLogin
        #listErrado[cont] = loginFinal[1]
        contErrado = contErrado+1
        #print(dictErrado)

    for emailCerto in listEmailCerto:
        loginCerto = emailCerto.split("@")
        LoginCertoFinal = loginCerto[0].split("'")
        tamLoginCerto = len(LoginCertoFinal[1])
        dictCerto[contCerto] = tamLoginCerto
        contCerto = contCerto +1

    domains = ['Gmail', 'Hotmail', 'HotmailBr', 'HotmailMx', 'HotmailAr', 'Msn']
    countDomains = [len(gmail),  len(hotmail), len(hotmailBr), len(hotmailMX), len(hotmailAr), len(msn)]
    descricaoX = 'Domínios'
    descricaoY = 'Quantidades de erros de escrita'

    #plotarGraficos(domains, countDomains, descricaoX, descricaoY)
    #plotarGraficos(dictCerto.values(), descricaoX,domains, 'Tamanho do login')

    return render(request, 'resultados.html',
                  {'countDomains': countDomains,
                   'totalEmails': total,
                   'totalCertos':totalCertos,
                   'totalErrados': totalErrados,
                   'emailAdicionado': emailAdicionado})

def plotarGraficos(x, y, xLbael, yLabel):
    #plt.plot(x, y)

    #plt.show()
    plt.scatter(x=x, y=y)
    plt.xlabel(xLbael)
    plt.ylabel(yLabel)
    plt.grid(True)
    plt.show()

def adicionarEmail(request):
    if request.method == 'POST':
        getEmail = request.POST['email']
        lerArquivos(getEmail)

    #return render(request, 'resultados.html',{'results' : results})


lerArquivos('"'"slrocha@gmail.com"'"')
