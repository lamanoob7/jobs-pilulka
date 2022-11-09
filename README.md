# jobs-pilulka
## Úkol
### Podmínky splnění domácího úkolu:

Pro využití knihoven a balíčků 3tích stran prosím využij composer - https://getcomposer.org/ a https://packagist.org/

PHP musí být ve strict type módu verze 8.0 a výše.
Je jedno, jestli bude použit docker / vagrant / nebo přímá instalaci PHP a Apache/Nginx na svém stroji.
Je nám jedno, jestli se použije nějaký framework, či se použijí šikovně poskládané komponenty 3tích stran.
Zdrojové kódy musí být na githubu - tak abychom je mohli projít.
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

## Řešení

### Shrnutí

Pro vypracování úkolu jsem se rozhodl použít základ svých Docker nastavení, které používám nejméně nyní k vypracování úloh.

Pro tento konkrétní úkol jsem  upravil nastavení, aby běželo na PHP 8.1.

### Twitter API
Po prvním použití [noweh/twitter-api-v2-php](https://packagist.org/packages/noweh/twitter-api-v2-php) jsem se rozhodl, že se hashtagy moc přepisují na obyčejná slova a rozhodl se využít klihovnu [BlueElephant]([https://](https://birdelephant.com/)), která byla méně specifická a bylo nutné ručně definovat více věcí,

### Problémy
Ke stažení 100 nejnovějších příspěvků bohužel nemám dostatečný na typ účtu na Twitteru ( viz `https://developer.twitter.com/en/docs/twitter-api/getting-started/about-twitter-api#v2-access-level` ).
Přesto věřím, že napsané řešení při nastavení dostatečným účtem  dokáže stáhnout dostatek.

Proto jsem využil funkci `recent()` místo `all()` v `App\Service\TwitterLoaded` na řádku 40.

