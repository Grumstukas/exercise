
##PHP uzduotis 2
Bendrieji reikalavimai


Trečiųjų šalių frameworkų ir libų naudojimas draudžiamas.

Būtina naudoti kodo versijavimo sistemą (VCS), koda pateikti galima per Bitbucket, GitHub ar GitLab. Commitai turi tureti prasmingus komentarus.

Kodas turi būti rašomas laikantis PSR-1 ir PSR-2.

Būtina taikyti SOLID, nepamirštam DRY bei KISS.

Privaloma komentuoti kodą (minimum bent blokais) bei privaloma rašyti PHP Doc.

Visi php failai turi būti loadinami dinamiškai (naudojamas autoloaderis taikant PSR-4, composer naudoti negalima).

Programos konfiguraciją leidžiama saugoti bet kokiu budu (env, yaml, php,...).


Prieš darant rekomenduoju susipažinti su SOLID, DRY, KISS, MVC, Hexagonal (a.k.a. Ports and Adapters) architecture, Factory design patternų.

##1 variantas - skaitymas iš failo:


Reikia parašyti mini programėlę, kuri gali nuskaityti duomenys iš failo į asociatyvinį masyvą.

Duomenys gali būti pateikti vienu iš šių formatu: CSV, XML, JSON.

Programa turi būti parašyta taip, kad pridėjus naują (ar pašalinus esamą) failo formatą nereiktų nieko koreguoti esamame kode (išskyrus konfiguraciją).


Kaip tai daugmaž turėtų veikti:

Perduodame programai failo pavadinimą.
Ekrane pamatome failo turinį.


CSV:

'first_name','age','gender'

'Kiestis',29,'male'

'Vytska',32,'male'

'Karina',25,'female'


XML:

<?xml version="1.0" encoding="UTF-8" ?>

<items>

    <item>

        <first_name>Kiestis</first_name>

        <age>29</age>

        <gender>male</gender>

    </item>

    <item>

        <first_name>Vytska</first_name>

        <age>32</age>

        <gender>male</gender>

    </item>

    <item>

        <first_name>Karina</first_name>

        <age>25</age>

        <gender>female</gender>

    </item>

</items>


JSON:

[

    {

        "first_name":"Kiestis",

        "age":29,

        "gender":"male"

    },

    {

        "first_name":"Vytska",

        "age":32,

        "gender":"male"

    },

    {

        "first_name":"Karina",

        "age":25,

        "gender":"female"

    }

]




##2 variantas - rašymas į failą:


Reikia parašyti mini programėlę, kuri gali išsaugoti duomenis iš asociatyvinio masyvo (žemiau pateiktas masyvo pvz.) į failą.

Duomenys gali būti išsaugomi vienu iš šių formatu: CSV, XML, JSON.

Programa turi būti parašyta taip, kad pridėjus naują (ar pašalinus esamą) failo formatą nereiktų nieko koreguoti esamame kode (išskyrus konfiguraciją).


Kaip tai daugmaž turėtų veikti:

Perduodame programai failo pavadinimą.
Programa duomenis iš masyvo išsaugo į failą.

Duomenų pvz.:

[

    [

        'first_name' => 'Kiestis',

        'age' => 29,

        'gender' => 'male'

    ],

    [

        'first_name' => 'Vytska',

        'age' => 32,

        'gender' => 'male'

    ],

    [

        'first_name' => 'Karina',

        'age' => 25,

        'gender' => 'female'

    ],

]





##3 variantas - duomenų atidavimas:


Reikia parašyti mini programėlę, kuri duomenis iš asociatyvinio masyvo grąžintu pasirinktu formatu.

Duomenys gali būti grąžinami vienu iš šių formatu: CSV, XML, JSON.

Programa turi būti parašyta taip, kad pridėjus naują (ar pašalinus esamą) formatą nereiktų nieko koreguoti esamame kode (išskyrus konfiguraciją).


Kaip tai daugmaž turėtų veikti:

Siunčiam HTTP užklausą su nurodytu formatu.
Gauname duomenis.

Duomenų pvz.:

[

    [

        'first_name' => 'Kiestis',

        'age' => 29,

        'gender' => 'male'

    ],

    [

        'first_name' => 'Vytska',

        'age' => 32,

        'gender' => 'male'

    ],

    [

        'first_name' => 'Karina',

        'age' => 25,

        'gender' => 'female'

    ],

]

####1 variantas - skaitymas iš failo:
Reikia parašyti mini programėlę, kuri gali nuskaityti duomenys iš failo į asociatyvinį masyvą.

####2 variantas - rašymas į failą:
Reikia parašyti mini programėlę, kuri gali išsaugoti duomenis iš asociatyvinio masyvo (žemiau pateiktas masyvo pvz.) į failą.

####3 variantas - duomenų atidavimas:
Reikia parašyti mini programėlę, kuri duomenis iš asociatyvinio masyvo grąžintu pasirinktu formatu.