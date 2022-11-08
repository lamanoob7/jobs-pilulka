# jobs-pilulka
## Úkol
### Podmínky splnění domácího úkolu:

Pro využití knihoven a balíčků 3tích stran prosím využij composer - https://getcomposer.org/ a https://packagist.org/

X PHP musí být ve strict type módu verze 8.0 a výše.
X Je jedno, jestli bude použit docker / vagrant / nebo přímá instalaci PHP a Apache/Nginx na svém stroji.
X Je nám jedno, jestli se použije nějaký framework, či se použijí šikovně poskládané komponenty 3tích stran.
X Zdrojové kódy musí být na githubu - tak abychom je mohli projít.
Projekt musí mít manuál, jak aplikaci rozběhnout a co je k tomu potřeba udělat.

### Zadání:

Na twitteru se objevují zprávičky, ve kterých je obsažen odkaz pilulka.cz nebo hashtag #pilulka / #pilulkacz atd.

Chceme zobrazit aktuálně 100 nejnovějších zpráv, které obsahují hashtag / nebo odkaz na pilulka.cz

Ideálně ve formátu json pro API způsob načítání a taktéž v hezkém HTML doplněném o nějakou jednoduchou šablonu (Latte atd) - pro vstup uživatele.

Konfiguraci dát mimo zdrojový kód, aby se dala jednoduše měnit.

Využité postupy / zdroje, prosím taktéž uvést do dokumentace (např. zde se věnuje napojením na API twitteru) atd.

Odkaz na github poté poslat v odpovědi na email zpět.


Těšíme se na výstup

## Spustění
### Docker kontejnery
vytvoření všech docker containerů
```
docker-compose up --build -d
```
### struktura DB 
pro vytvoření základní struktury databáze je nejprve nutné se přihlísit do kontejneru s DB
```
docker-compose exec pilulka-db bash
```
a pak je potřeba spustit skript na vytvoření DB
```
mysql -uroot -ppilulka < /var/install/install.sql && exit
```
## Řešení
### API

`https://packagist.org/packages/noweh/twitter-api-v2-php`



