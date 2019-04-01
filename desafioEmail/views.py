from django.shortcuts import render
from fuzzywuzzy import fuzz
from fuzzywuzzy import process
import matplotlib.pyplot as plt
import pandas as pd

# Create your views here.

def index(request):
    return render(request, 'index.html')

def lerArquivos(request):
    dominios = 'C:/xampp/htdocs/desafio_emails/domain_list.csv'
    emails = 'C:/xampp/htdocs/desafio_emails/email_list.csv'

    dadosDominios = []
    novoDadosDominios = []
    dadosEmails = []
    novosDadosEmails = []

    lista_dominios = pd.read_csv(dominios, names=['Domain'])
    lista_emails = pd.read_csv(emails, names=["E-mails"])
    total = lista_emails.shape[0]

    if request.POST['email'] != "":
        emailAdicionado = request.POST['email']
        lista_emails.loc[total+1] = emailAdicionado
        total = lista_emails.shape[0]
    else:
        emailAdicionado = ""

    for (i, row) in lista_dominios.itertuples():
        dadosDominios.append(row)

    for dominio in dadosDominios:
        itemDominio = dominio
        for y in ["'"]:
            item = itemDominio.replace(y, "")
            novoDadosDominios.append(item)

    for (j, linha) in lista_emails.itertuples():
        dadosEmails.append(linha)

    for emailList in dadosEmails:
        itemEmail = emailList
        for z in ["'"]:
            addEmail = itemEmail.replace(z, "")
            novosDadosEmails.append(addEmail)

    listEmailCerto = []
    listEmailErrado = []
    for i in novosDadosEmails:
        resultado = i.split("@")
        email = i
        if resultado[1] in novoDadosDominios:
            listEmailCerto.append(email)
        else:
            listEmailErrado.append(email)

    totalErrados = len(listEmailErrado)
    totalCertos = len(listEmailCerto)
    corrigidos = []
    gmail = [] #0
    hotmail = [] #1
    hotmailBr = [] #2
    hotmailMX = [] #3
    hotmailAr = [] #4
    msn = [] #5

    for i in listEmailErrado:
        resultadoErrado = i.split("@")
        z = process.extractOne(resultadoErrado[1], novoDadosDominios, scorer=fuzz.token_sort_ratio)
        resultadoErrado[1] = z[0]
        corrigidos.append(resultadoErrado[0] + '@' + resultadoErrado[1])
        if z[0] == 'gmail.com':
            gmail.append(resultadoErrado[0] + '@' + resultadoErrado[1])
        elif z[0] == 'hotmail.com.br':
            hotmailBr.append(resultadoErrado[0] + '@' + resultadoErrado[1])
        elif z[0] == 'hotmail.com.mx':
            hotmailMX.append(resultadoErrado[0] + '@' + resultadoErrado[1])
        elif z[0] == 'hotmail.com.ar':
            hotmailAr.append(resultadoErrado[0] + '@' + resultadoErrado[1])
        elif z[0] == 'msn.com':
            msn.append(resultadoErrado[0] + '@' + resultadoErrado[1])
        else:
            hotmail.append(resultadoErrado[0] + '@' + resultadoErrado[1])

    dictErrado = {}
    dictCerto ={}

    for emailCorrigido in corrigidos:
        login = emailCorrigido.split("@")
        tamLogin = len(login[0])
        dictErrado[login[0]] = [tamLogin, login[1]]
        login[1]=""

    dataFrameErrados = pd.DataFrame(data=dictErrado)
    datasetErrados = dataFrameErrados.T.reset_index()

    for (i, row) in datasetErrados[1].iteritems():
        if row == "gmail.com":
            datasetErrados[1][i] = 0;
        if row == "hotmail.com":
            datasetErrados[1][i] = 1;
        if row == "hotmail.com.br":
            datasetErrados[1][i] = 2;
        if row == "hotmail.com.mx":
            datasetErrados[1][i] = 3;
        if row == "hotmail.com.ar":
            datasetErrados[1][i] = 4;
        if row == "msn.com":
            datasetErrados[1][i] = 5;

    groupByErrados = datasetErrados.groupby([datasetErrados[0],datasetErrados[1]], as_index=False).size()

    print(groupByErrados)
    #exit()

    for emailCerto in listEmailCerto:
        loginCerto = emailCerto.split("@")
        tamLoginCerto = len(loginCerto[0])
        dictCerto[loginCerto[0]] = [tamLoginCerto, loginCerto[1]]
        loginCerto[1] = ""

    dataFrameCerto = pd.DataFrame(data=dictCerto)
    datasetCerto = dataFrameCerto.T.reset_index()

    for (a, rows) in datasetCerto[1].iteritems():
        if rows == "gmail.com":
            datasetCerto[1][a] = 0;
        if rows == "hotmail.com":
            datasetCerto[1][a] = 1;
        if rows == "hotmail.com.br":
            datasetCerto[1][a] = 2;
        if rows == "hotmail.com.mx":
            datasetCerto[1][a] = 3;
        if rows == "hotmail.com.ar":
            datasetCerto[1][a] = 4;
        if rows == "msn.com":
            datasetCerto[1][a] = 5;

    print(datasetCerto.groupby([datasetCerto[0], datasetCerto[1]]).size())

    domains = ['Gmail', 'Hotmail', 'HotmailBr', 'HotmailMx', 'HotmailAr', 'Msn']
    countDomains = [len(gmail),  len(hotmail), len(hotmailBr), len(hotmailMX), len(hotmailAr), len(msn)]
    descricaoX = 'Domínios'
    descricaoY = 'Quantidades de erros de escrita'

    #plotarGraficos(domains, countDomains, descricaoX, descricaoY)
    #plotarGraficos(dictCerto.values(), descricaoX,domains, 'Tamanho do login') 'countDomains': countDomains,'''

    countDomains = [len(gmail), len(hotmail), len(hotmailBr), len(hotmailMX), len(hotmailAr), len(msn)]

    return {'countDomains': countDomains,
                   'totalEmails': total,
                   'totalCertos':totalCertos,
                   'totalErrados': totalErrados,
                   'emailAdicionado': emailAdicionado}

def plotarGraficos(x, y, xLbael, yLabel):
    plt.scatter(x=x, y=y)
    plt.xlabel(xLbael)
    plt.ylabel(yLabel)
    plt.grid(True)
    plt.show()

def adicionarEmail(request):
    if request.method == 'POST':
        results = lerArquivos(request)
        return render(request, 'resultados.html',{'results': results})


#lerArquivos("'slrocha@gmail.com'")