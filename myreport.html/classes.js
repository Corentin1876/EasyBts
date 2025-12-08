var classes = [
    {
        "name": "App\\Command\\CreateAdminCommand",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "execute",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 3,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Symfony\\Component\\Console\\Command\\Command",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\PasswordHasher\\Hasher\\UserPasswordHasherInterface",
            "Symfony\\Component\\Console\\Input\\InputInterface",
            "Symfony\\Component\\Console\\Output\\OutputInterface",
            "Symfony\\Component\\Console\\Style\\SymfonyStyle",
            "App\\Entity\\Utilisateur",
            "DateTime"
        ],
        "parents": [
            "Symfony\\Component\\Console\\Command\\Command"
        ],
        "implements": [],
        "lcom": 2,
        "length": 58,
        "vocabulary": 30,
        "volume": 284.6,
        "difficulty": 2.83,
        "effort": 806.37,
        "level": 0.35,
        "bugs": 0.09,
        "time": 45,
        "intelligentContent": 100.45,
        "number_operators": 7,
        "number_operands": 51,
        "number_operators_unique": 3,
        "number_operands_unique": 27,
        "cloc": 2,
        "loc": 36,
        "lloc": 34,
        "mi": 66.99,
        "mIwoC": 49.14,
        "commentWeight": 17.85,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 256,
        "relativeDataComplexity": 0.24,
        "relativeSystemComplexity": 256.24,
        "totalStructuralComplexity": 512,
        "totalDataComplexity": 0.47,
        "totalSystemComplexity": 512.47,
        "package": "App\\Command\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 8,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Command\\FixUserRolesCommand",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "execute",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 6,
        "ccn": 5,
        "ccnMethodMax": 5,
        "externals": [
            "Symfony\\Component\\Console\\Command\\Command",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\Console\\Input\\InputInterface",
            "Symfony\\Component\\Console\\Output\\OutputInterface",
            "Symfony\\Component\\Console\\Style\\SymfonyStyle"
        ],
        "parents": [
            "Symfony\\Component\\Console\\Command\\Command"
        ],
        "implements": [],
        "lcom": 1,
        "length": 42,
        "vocabulary": 20,
        "volume": 181.52,
        "difficulty": 5.33,
        "effort": 968.11,
        "level": 0.19,
        "bugs": 0.06,
        "time": 54,
        "intelligentContent": 34.04,
        "number_operators": 10,
        "number_operands": 32,
        "number_operators_unique": 5,
        "number_operands_unique": 15,
        "cloc": 1,
        "loc": 31,
        "lloc": 30,
        "mi": 65.02,
        "mIwoC": 51.29,
        "commentWeight": 13.73,
        "kanDefect": 0.52,
        "relativeStructuralComplexity": 64,
        "relativeDataComplexity": 0.28,
        "relativeSystemComplexity": 64.28,
        "totalStructuralComplexity": 128,
        "totalDataComplexity": 0.56,
        "totalSystemComplexity": 128.56,
        "package": "App\\Command\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\AdhesionMDLController",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "show",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "edit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "delete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 6,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\AdhesionMDLRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\AdhesionMDL",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\AdhesionMDL",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\AdhesionMDL",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\AdhesionMDL",
            "Doctrine\\ORM\\EntityManagerInterface"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 96,
        "vocabulary": 30,
        "volume": 471.06,
        "difficulty": 8,
        "effort": 3768.49,
        "level": 0.13,
        "bugs": 0.16,
        "time": 209,
        "intelligentContent": 58.88,
        "number_operators": 16,
        "number_operands": 80,
        "number_operators_unique": 5,
        "number_operands_unique": 25,
        "cloc": 6,
        "loc": 48,
        "lloc": 42,
        "mi": 71.1,
        "mIwoC": 45.07,
        "commentWeight": 26.04,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 196,
        "relativeDataComplexity": 0.6,
        "relativeSystemComplexity": 196.6,
        "totalStructuralComplexity": 980,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 983,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\AdminController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "utilisateurs",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "toggleRole",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deleteUser",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "dossiersBts",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "dossierDetail",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "validerDossier",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "rejeterDossier",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "demanderModification",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 8,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 8,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 12,
        "ccn": 5,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\Utilisateur",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\Utilisateur",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\FormulaireInscription",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\FormulaireInscription",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\FormulaireInscription",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\FormulaireInscription",
            "Doctrine\\ORM\\EntityManagerInterface"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 2,
        "length": 185,
        "vocabulary": 60,
        "volume": 1092.77,
        "difficulty": 6.68,
        "effort": 7301.72,
        "level": 0.15,
        "bugs": 0.36,
        "time": 406,
        "intelligentContent": 163.54,
        "number_operators": 38,
        "number_operands": 147,
        "number_operators_unique": 5,
        "number_operands_unique": 55,
        "cloc": 10,
        "loc": 85,
        "lloc": 75,
        "mi": 62.48,
        "mIwoC": 37.15,
        "commentWeight": 25.34,
        "kanDefect": 0.68,
        "relativeStructuralComplexity": 625,
        "relativeDataComplexity": 0.37,
        "relativeSystemComplexity": 625.37,
        "totalStructuralComplexity": 5000,
        "totalDataComplexity": 2.96,
        "totalSystemComplexity": 5002.96,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\AnneeScolaireController",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "show",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "edit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "delete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 6,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\AnneeScolaireRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\AnneeScolaire",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\AnneeScolaire",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\AnneeScolaire",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\AnneeScolaire",
            "Doctrine\\ORM\\EntityManagerInterface"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 96,
        "vocabulary": 30,
        "volume": 471.06,
        "difficulty": 8,
        "effort": 3768.49,
        "level": 0.13,
        "bugs": 0.16,
        "time": 209,
        "intelligentContent": 58.88,
        "number_operators": 16,
        "number_operands": 80,
        "number_operators_unique": 5,
        "number_operands_unique": 25,
        "cloc": 6,
        "loc": 48,
        "lloc": 42,
        "mi": 71.1,
        "mIwoC": 45.07,
        "commentWeight": 26.04,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 196,
        "relativeDataComplexity": 0.6,
        "relativeSystemComplexity": 196.6,
        "totalStructuralComplexity": 980,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 983,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\AssuranceScolaireController",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "show",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "edit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "delete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 6,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\AssuranceScolaireRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\AssuranceScolaire",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\AssuranceScolaire",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\AssuranceScolaire",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\AssuranceScolaire",
            "Doctrine\\ORM\\EntityManagerInterface"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 96,
        "vocabulary": 30,
        "volume": 471.06,
        "difficulty": 8,
        "effort": 3768.49,
        "level": 0.13,
        "bugs": 0.16,
        "time": 209,
        "intelligentContent": 58.88,
        "number_operators": 16,
        "number_operands": 80,
        "number_operators_unique": 5,
        "number_operands_unique": 25,
        "cloc": 6,
        "loc": 48,
        "lloc": 42,
        "mi": 71.1,
        "mIwoC": 45.07,
        "commentWeight": 26.04,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 196,
        "relativeDataComplexity": 0.6,
        "relativeSystemComplexity": 196.6,
        "totalStructuralComplexity": 980,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 983,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\BtsInscriptionController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "liste",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "choix",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "reset",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "inscription",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "saveProgress",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "uploadDocument",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "submit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "downloadPdf",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 8,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 8,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 145,
        "ccn": 138,
        "ccnMethodMax": 87,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Repository\\SpecialisationRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\SpecialisationRepository",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\Specialisation",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\Specialisation",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\FormulaireInscription",
            "DateTime",
            "DateTime",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\Specialisation",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\Specialisation",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\FormulaireInscription",
            "DateTime",
            "DateTime",
            "DateTime",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\FormulaireInscription",
            "Doctrine\\ORM\\EntityManagerInterface",
            "ZipArchive",
            "Exception",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Exception",
            "Exception"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 1176,
        "vocabulary": 249,
        "volume": 9360.96,
        "difficulty": 29.04,
        "effort": 271827.94,
        "level": 0.03,
        "bugs": 3.12,
        "time": 15102,
        "intelligentContent": 322.36,
        "number_operators": 270,
        "number_operands": 906,
        "number_operators_unique": 15,
        "number_operands_unique": 234,
        "cloc": 68,
        "loc": 421,
        "lloc": 353,
        "mi": 29.16,
        "mIwoC": 0,
        "commentWeight": 29.16,
        "kanDefect": 3.05,
        "relativeStructuralComplexity": 4096,
        "relativeDataComplexity": 0.42,
        "relativeSystemComplexity": 4096.42,
        "totalStructuralComplexity": 32768,
        "totalDataComplexity": 3.35,
        "totalSystemComplexity": 32771.35,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 10,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\FormulaireInscriptionController",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "show",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "edit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "delete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 6,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\FormulaireInscriptionRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\FormulaireInscription",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\FormulaireInscription",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\FormulaireInscription",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\FormulaireInscription",
            "Doctrine\\ORM\\EntityManagerInterface"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 96,
        "vocabulary": 30,
        "volume": 471.06,
        "difficulty": 8,
        "effort": 3768.49,
        "level": 0.13,
        "bugs": 0.16,
        "time": 209,
        "intelligentContent": 58.88,
        "number_operators": 16,
        "number_operands": 80,
        "number_operators_unique": 5,
        "number_operands_unique": 25,
        "cloc": 6,
        "loc": 48,
        "lloc": 42,
        "mi": 71.1,
        "mIwoC": 45.07,
        "commentWeight": 26.04,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 196,
        "relativeDataComplexity": 0.6,
        "relativeSystemComplexity": 196.6,
        "totalStructuralComplexity": 980,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 983,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\HomeController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "specialisationDetail",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "inscription",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "contact",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "sitemap",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "accessibility",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "legal",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "privacy",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "cookies",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "faq",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "monCompte",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "guide",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "calendrier",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "aideTechnique",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "etablissements",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "formations",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "carteEtablissements",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "tauxReussite",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 18,
        "nbMethods": 18,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 18,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 30,
        "ccn": 13,
        "ccnMethodMax": 13,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\Specialisation",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Symfony\\Component\\Messenger\\MessageBusInterface",
            "Symfony\\Component\\Validator\\Validator\\ValidatorInterface",
            "Psr\\Log\\LoggerInterface",
            "App\\Dto\\ContactFormData",
            "App\\Message\\ContactMessage",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Response"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 253,
        "vocabulary": 111,
        "volume": 1718.99,
        "difficulty": 8.08,
        "effort": 13885.41,
        "level": 0.12,
        "bugs": 0.57,
        "time": 771,
        "intelligentContent": 212.81,
        "number_operators": 45,
        "number_operands": 208,
        "number_operators_unique": 8,
        "number_operands_unique": 103,
        "cloc": 6,
        "loc": 144,
        "lloc": 138,
        "mi": 44.47,
        "mIwoC": 28.92,
        "commentWeight": 15.55,
        "kanDefect": 1.12,
        "relativeStructuralComplexity": 576,
        "relativeDataComplexity": 0.78,
        "relativeSystemComplexity": 576.78,
        "totalStructuralComplexity": 10368,
        "totalDataComplexity": 14.08,
        "totalSystemComplexity": 10382.08,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 10,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\InformationEleveController",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "show",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "edit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "delete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 6,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\InformationEleveRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\InformationEleve",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\InformationEleve",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\InformationEleve",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\InformationEleve",
            "Doctrine\\ORM\\EntityManagerInterface"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 96,
        "vocabulary": 30,
        "volume": 471.06,
        "difficulty": 8,
        "effort": 3768.49,
        "level": 0.13,
        "bugs": 0.16,
        "time": 209,
        "intelligentContent": 58.88,
        "number_operators": 16,
        "number_operands": 80,
        "number_operators_unique": 5,
        "number_operands_unique": 25,
        "cloc": 6,
        "loc": 48,
        "lloc": 42,
        "mi": 71.1,
        "mIwoC": 45.07,
        "commentWeight": 26.04,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 196,
        "relativeDataComplexity": 0.6,
        "relativeSystemComplexity": 196.6,
        "totalStructuralComplexity": 980,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 983,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\InscriptionController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "register",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "login",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "logout",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "forgotPassword",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "forgotPasswordRequest",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "resetPassword",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "resetPasswordUpdate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 8,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 8,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 30,
        "ccn": 23,
        "ccnMethodMax": 13,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\Security\\Http\\Authentication\\AuthenticationUtils",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Symfony\\Component\\PasswordHasher\\Hasher\\UserPasswordHasherInterface",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\Utilisateur",
            "DateTime",
            "DateTime",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\Security\\Http\\Authentication\\AuthenticationUtils",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\Mailer\\MailerInterface",
            "App\\Entity\\PasswordResetToken",
            "DateTime",
            "Symfony\\Component\\Mime\\Email",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\PasswordResetTokenRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\PasswordHasher\\Hasher\\UserPasswordHasherInterface",
            "App\\Repository\\PasswordResetTokenRepository"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 2,
        "length": 360,
        "vocabulary": 84,
        "volume": 2301.23,
        "difficulty": 13.09,
        "effort": 30125.25,
        "level": 0.08,
        "bugs": 0.77,
        "time": 1674,
        "intelligentContent": 175.79,
        "number_operators": 72,
        "number_operands": 288,
        "number_operators_unique": 7,
        "number_operands_unique": 77,
        "cloc": 28,
        "loc": 171,
        "lloc": 143,
        "mi": 55.68,
        "mIwoC": 26.35,
        "commentWeight": 29.33,
        "kanDefect": 1.15,
        "relativeStructuralComplexity": 2025,
        "relativeDataComplexity": 0.39,
        "relativeSystemComplexity": 2025.39,
        "totalStructuralComplexity": 16200,
        "totalDataComplexity": 3.09,
        "totalSystemComplexity": 16203.09,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 12,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\MedecinController",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "show",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "edit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "delete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 6,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\MedecinRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\Medecin",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\Medecin",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\Medecin",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\Medecin",
            "Doctrine\\ORM\\EntityManagerInterface"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 96,
        "vocabulary": 29,
        "volume": 466.37,
        "difficulty": 8.33,
        "effort": 3886.38,
        "level": 0.12,
        "bugs": 0.16,
        "time": 216,
        "intelligentContent": 55.96,
        "number_operators": 16,
        "number_operands": 80,
        "number_operators_unique": 5,
        "number_operands_unique": 24,
        "cloc": 6,
        "loc": 48,
        "lloc": 42,
        "mi": 71.13,
        "mIwoC": 45.1,
        "commentWeight": 26.04,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 196,
        "relativeDataComplexity": 0.6,
        "relativeSystemComplexity": 196.6,
        "totalStructuralComplexity": 980,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 983,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\ResponsableController",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "show",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "edit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "delete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 6,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\ResponsableRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\Responsable",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\Responsable",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\Responsable",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\Responsable",
            "Doctrine\\ORM\\EntityManagerInterface"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 96,
        "vocabulary": 29,
        "volume": 466.37,
        "difficulty": 8.33,
        "effort": 3886.38,
        "level": 0.12,
        "bugs": 0.16,
        "time": 216,
        "intelligentContent": 55.96,
        "number_operators": 16,
        "number_operands": 80,
        "number_operators_unique": 5,
        "number_operands_unique": 24,
        "cloc": 6,
        "loc": 48,
        "lloc": 42,
        "mi": 71.13,
        "mIwoC": 45.1,
        "commentWeight": 26.04,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 196,
        "relativeDataComplexity": 0.6,
        "relativeSystemComplexity": 196.6,
        "totalStructuralComplexity": 980,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 983,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\SanteController",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "show",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "edit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "delete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 6,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\SanteRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\Sante",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\Sante",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\Sante",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\Sante",
            "Doctrine\\ORM\\EntityManagerInterface"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 96,
        "vocabulary": 29,
        "volume": 466.37,
        "difficulty": 8.33,
        "effort": 3886.38,
        "level": 0.12,
        "bugs": 0.16,
        "time": 216,
        "intelligentContent": 55.96,
        "number_operators": 16,
        "number_operands": 80,
        "number_operators_unique": 5,
        "number_operands_unique": 24,
        "cloc": 6,
        "loc": 48,
        "lloc": 42,
        "mi": 71.13,
        "mIwoC": 45.1,
        "commentWeight": 26.04,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 196,
        "relativeDataComplexity": 0.6,
        "relativeSystemComplexity": 196.6,
        "totalStructuralComplexity": 980,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 983,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\ScolariteDes2AnneeAnterieurController",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "show",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "edit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "delete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 6,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\ScolariteDes2AnneeAnterieurRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\ScolariteDes2AnneeAnterieur",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\ScolariteDes2AnneeAnterieur",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\ScolariteDes2AnneeAnterieur",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\ScolariteDes2AnneeAnterieur",
            "Doctrine\\ORM\\EntityManagerInterface"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 96,
        "vocabulary": 30,
        "volume": 471.06,
        "difficulty": 8,
        "effort": 3768.49,
        "level": 0.13,
        "bugs": 0.16,
        "time": 209,
        "intelligentContent": 58.88,
        "number_operators": 16,
        "number_operands": 80,
        "number_operators_unique": 5,
        "number_operands_unique": 25,
        "cloc": 6,
        "loc": 48,
        "lloc": 42,
        "mi": 71.1,
        "mIwoC": 45.07,
        "commentWeight": 26.04,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 196,
        "relativeDataComplexity": 0.6,
        "relativeSystemComplexity": 196.6,
        "totalStructuralComplexity": 980,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 983,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\SecuriteSocialeController",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "show",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "edit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "delete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 6,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\SecuriteSocialeRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\SecuriteSociale",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\SecuriteSociale",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\SecuriteSociale",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\SecuriteSociale",
            "Doctrine\\ORM\\EntityManagerInterface"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 96,
        "vocabulary": 30,
        "volume": 471.06,
        "difficulty": 8,
        "effort": 3768.49,
        "level": 0.13,
        "bugs": 0.16,
        "time": 209,
        "intelligentContent": 58.88,
        "number_operators": 16,
        "number_operands": 80,
        "number_operators_unique": 5,
        "number_operands_unique": 25,
        "cloc": 6,
        "loc": 48,
        "lloc": 42,
        "mi": 71.1,
        "mIwoC": 45.07,
        "commentWeight": 26.04,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 196,
        "relativeDataComplexity": 0.6,
        "relativeSystemComplexity": 196.6,
        "totalStructuralComplexity": 980,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 983,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\SpecialisationController",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "show",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "edit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "delete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 6,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\SpecialisationRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\Specialisation",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\Specialisation",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\Specialisation",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\Specialisation",
            "Doctrine\\ORM\\EntityManagerInterface"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 96,
        "vocabulary": 29,
        "volume": 466.37,
        "difficulty": 8.33,
        "effort": 3886.38,
        "level": 0.12,
        "bugs": 0.16,
        "time": 216,
        "intelligentContent": 55.96,
        "number_operators": 16,
        "number_operands": 80,
        "number_operators_unique": 5,
        "number_operands_unique": 24,
        "cloc": 6,
        "loc": 48,
        "lloc": 42,
        "mi": 71.13,
        "mIwoC": 45.1,
        "commentWeight": 26.04,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 196,
        "relativeDataComplexity": 0.6,
        "relativeSystemComplexity": 196.6,
        "totalStructuralComplexity": 980,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 983,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\TypeResponsableController",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "show",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "edit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "delete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 6,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\TypeResponsableRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\TypeResponsable",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\TypeResponsable",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\TypeResponsable",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\TypeResponsable",
            "Doctrine\\ORM\\EntityManagerInterface"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 96,
        "vocabulary": 30,
        "volume": 471.06,
        "difficulty": 8,
        "effort": 3768.49,
        "level": 0.13,
        "bugs": 0.16,
        "time": 209,
        "intelligentContent": 58.88,
        "number_operators": 16,
        "number_operands": 80,
        "number_operators_unique": 5,
        "number_operands_unique": 25,
        "cloc": 6,
        "loc": 48,
        "lloc": 42,
        "mi": 71.1,
        "mIwoC": 45.07,
        "commentWeight": 26.04,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 196,
        "relativeDataComplexity": 0.6,
        "relativeSystemComplexity": 196.6,
        "totalStructuralComplexity": 980,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 983,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Controller\\UtilisateurController",
        "interface": false,
        "abstract": false,
        "final": true,
        "methods": [
            {
                "name": "index",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "new",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "show",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "edit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "delete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 6,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Repository\\UtilisateurRepository",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\Utilisateur",
            "Symfony\\Component\\HttpFoundation\\Response",
            "App\\Entity\\Utilisateur",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\Utilisateur",
            "Doctrine\\ORM\\EntityManagerInterface",
            "Symfony\\Component\\HttpFoundation\\Response",
            "Symfony\\Component\\HttpFoundation\\Request",
            "App\\Entity\\Utilisateur",
            "Doctrine\\ORM\\EntityManagerInterface"
        ],
        "parents": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\AbstractController"
        ],
        "implements": [],
        "lcom": 1,
        "length": 96,
        "vocabulary": 29,
        "volume": 466.37,
        "difficulty": 8.33,
        "effort": 3886.38,
        "level": 0.12,
        "bugs": 0.16,
        "time": 216,
        "intelligentContent": 55.96,
        "number_operators": 16,
        "number_operands": 80,
        "number_operators_unique": 5,
        "number_operands_unique": 24,
        "cloc": 6,
        "loc": 48,
        "lloc": 42,
        "mi": 71.13,
        "mIwoC": 45.1,
        "commentWeight": 26.04,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 196,
        "relativeDataComplexity": 0.6,
        "relativeSystemComplexity": 196.6,
        "totalStructuralComplexity": 980,
        "totalDataComplexity": 3,
        "totalSystemComplexity": 983,
        "package": "App\\Controller\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Dto\\ContactFormData",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [],
        "nbMethodsIncludingGettersSetters": 0,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 0,
        "length": 25,
        "vocabulary": 23,
        "volume": 113.09,
        "difficulty": 0,
        "effort": 0,
        "level": 1.84,
        "bugs": 0.04,
        "time": 0,
        "intelligentContent": 208.08,
        "number_operators": 0,
        "number_operands": 25,
        "number_operators_unique": 0,
        "number_operands_unique": 23,
        "cloc": 15,
        "loc": 27,
        "lloc": 12,
        "mi": 107.68,
        "mIwoC": 61.95,
        "commentWeight": 45.73,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 0,
        "relativeSystemComplexity": 0,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 0,
        "totalSystemComplexity": 0,
        "package": "App\\Dto\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "App\\Entity\\AdhesionMDL",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getMontantAdhesion",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setMontantAdhesion",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getModeReglement",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setModeReglement",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFormulaireInscription",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setFormulaireInscription",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 7,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 4,
        "nbMethodsSetters": 3,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 0,
        "length": 28,
        "vocabulary": 8,
        "volume": 84,
        "difficulty": 3,
        "effort": 252,
        "level": 0.33,
        "bugs": 0.03,
        "time": 14,
        "intelligentContent": 28,
        "number_operators": 10,
        "number_operands": 18,
        "number_operators_unique": 2,
        "number_operands_unique": 6,
        "cloc": 7,
        "loc": 46,
        "lloc": 39,
        "mi": 80.09,
        "mIwoC": 51.68,
        "commentWeight": 28.41,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 7.43,
        "relativeSystemComplexity": 7.43,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 52,
        "totalSystemComplexity": 52,
        "package": "App\\Entity\\",
        "pageRank": 0.03,
        "afferentCoupling": 2,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "App\\Entity\\AnneeScolaire",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDate",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDate",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getInformationEleve",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setInformationEleve",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getScolariteDes2AnneeAnterieur",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setScolariteDes2AnneeAnterieur",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 7,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 4,
        "nbMethodsSetters": 3,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [
            "DateTime"
        ],
        "parents": [],
        "implements": [],
        "lcom": 0,
        "length": 28,
        "vocabulary": 8,
        "volume": 84,
        "difficulty": 3,
        "effort": 252,
        "level": 0.33,
        "bugs": 0.03,
        "time": 14,
        "intelligentContent": 28,
        "number_operators": 10,
        "number_operands": 18,
        "number_operators_unique": 2,
        "number_operands_unique": 6,
        "cloc": 7,
        "loc": 46,
        "lloc": 39,
        "mi": 80.09,
        "mIwoC": 51.68,
        "commentWeight": 28.41,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 7.43,
        "relativeSystemComplexity": 7.43,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 52,
        "totalSystemComplexity": 52,
        "package": "App\\Entity\\",
        "pageRank": 0.06,
        "afferentCoupling": 3,
        "efferentCoupling": 1,
        "instability": 0.25,
        "violations": {}
    },
    {
        "name": "App\\Entity\\AssuranceScolaire",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAdresse",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAdresse",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNumero",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNumero",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNom",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNom",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFormulaireInscription",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setFormulaireInscription",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 9,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 5,
        "nbMethodsSetters": 4,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 0,
        "length": 37,
        "vocabulary": 9,
        "volume": 117.29,
        "difficulty": 3.43,
        "effort": 402.13,
        "level": 0.29,
        "bugs": 0.04,
        "time": 22,
        "intelligentContent": 34.21,
        "number_operators": 13,
        "number_operands": 24,
        "number_operators_unique": 2,
        "number_operands_unique": 7,
        "cloc": 8,
        "loc": 57,
        "lloc": 49,
        "mi": 75.92,
        "mIwoC": 48.51,
        "commentWeight": 27.42,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 9.44,
        "relativeSystemComplexity": 9.44,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 85,
        "totalSystemComplexity": 85,
        "package": "App\\Entity\\",
        "pageRank": 0.03,
        "afferentCoupling": 2,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Contact",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCivilite",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCivilite",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNom",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNom",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPrenom",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPrenom",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getEmail",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setEmail",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTelephone",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTelephone",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSujet",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setSujet",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getMessage",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setMessage",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isConsent",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setConsent",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCreatedAt",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCreatedAt",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStatus",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setStatus",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUtilisateur",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUtilisateur",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 24,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 12,
        "nbMethodsSetters": 11,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "DateTimeImmutable",
            "DateTimeImmutable"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 130,
        "vocabulary": 46,
        "volume": 718.06,
        "difficulty": 2.16,
        "effort": 1550.36,
        "level": 0.46,
        "bugs": 0.24,
        "time": 86,
        "intelligentContent": 332.58,
        "number_operators": 35,
        "number_operands": 95,
        "number_operators_unique": 2,
        "number_operands_unique": 44,
        "cloc": 30,
        "loc": 153,
        "lloc": 123,
        "mi": 65.95,
        "mIwoC": 34.28,
        "commentWeight": 31.67,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 23.46,
        "relativeSystemComplexity": 23.46,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 563,
        "totalSystemComplexity": 563,
        "package": "App\\Entity\\",
        "pageRank": 0.04,
        "afferentCoupling": 3,
        "efferentCoupling": 1,
        "instability": 0.25,
        "violations": {}
    },
    {
        "name": "App\\Entity\\FormulaireInscription",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTypeFormulaire",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTypeFormulaire",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isEstSigne",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setEstSigne",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDateSoumission",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDateSoumission",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStatut",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setStatut",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getRemplitFormulaire",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setRemplitFormulaire",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAInformationsSante",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addAInformationsSante",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeAInformationsSante",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAScolariteAnterieure",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addAScolariteAnterieure",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeAScolariteAnterieure",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getInclutAdhesionMdl",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addInclutAdhesionMdl",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeInclutAdhesionMdl",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getResponsableDe",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addResponsableDe",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeResponsableDe",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getASecuriteSociale",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addASecuriteSociale",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeASecuriteSociale",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCouvertParAssurance",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addCouvertParAssurance",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeCouvertParAssurance",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 30,
        "nbMethods": 13,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 13,
        "nbMethodsGetter": 12,
        "nbMethodsSetters": 5,
        "wmc": 31,
        "ccn": 19,
        "ccnMethodMax": 3,
        "externals": [
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "DateTime",
            "Doctrine\\Common\\Collections\\Collection",
            "App\\Entity\\Sante",
            "App\\Entity\\Sante",
            "Doctrine\\Common\\Collections\\Collection",
            "App\\Entity\\ScolariteDes2AnneeAnterieur",
            "App\\Entity\\ScolariteDes2AnneeAnterieur",
            "Doctrine\\Common\\Collections\\Collection",
            "App\\Entity\\AdhesionMDL",
            "App\\Entity\\AdhesionMDL",
            "Doctrine\\Common\\Collections\\Collection",
            "App\\Entity\\Responsable",
            "App\\Entity\\Responsable",
            "Doctrine\\Common\\Collections\\Collection",
            "App\\Entity\\SecuriteSociale",
            "App\\Entity\\SecuriteSociale",
            "Doctrine\\Common\\Collections\\Collection",
            "App\\Entity\\AssuranceScolaire",
            "App\\Entity\\AssuranceScolaire"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 201,
        "vocabulary": 19,
        "volume": 853.83,
        "difficulty": 18.27,
        "effort": 15596.69,
        "level": 0.05,
        "bugs": 0.28,
        "time": 866,
        "intelligentContent": 46.74,
        "number_operators": 64,
        "number_operands": 137,
        "number_operators_unique": 4,
        "number_operands_unique": 15,
        "cloc": 57,
        "loc": 259,
        "lloc": 202,
        "mi": 59.85,
        "mIwoC": 26.63,
        "commentWeight": 33.22,
        "kanDefect": 1.41,
        "relativeStructuralComplexity": 225,
        "relativeDataComplexity": 1.85,
        "relativeSystemComplexity": 226.85,
        "totalStructuralComplexity": 6750,
        "totalDataComplexity": 55.44,
        "totalSystemComplexity": 6805.44,
        "package": "App\\Entity\\",
        "pageRank": 0.08,
        "afferentCoupling": 8,
        "efferentCoupling": 9,
        "instability": 0.53,
        "violations": {}
    },
    {
        "name": "App\\Entity\\InformationEleve",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNiveauClasse",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNiveauClasse",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSexe",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setSexe",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNumeroSecuriterSocial",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNumeroSecuriterSocial",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDateEntree",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDateEntree",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNationalite",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNationalite",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNaissanceDepartement",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNaissanceDepartement",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNaissanceCommune",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNaissanceCommune",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isRedoublement",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setRedoublement",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isTransport",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTransport",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTypeTransport",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTypeTransport",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNumeroImmatriculationVehicule",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNumeroImmatriculationVehicule",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSpecialiter",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setSpecialiter",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLangues",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setLangues",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDernierDiplome",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDernierDiplome",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getRegimeChoisi",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setRegimeChoisi",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDateChoixRegime",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDateChoixRegime",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isAutorisationDroitImage",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAutorisationDroitImage",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isPosibiliteDeChangementFinTrimestre",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPosibiliteDeChangementFinTrimestre",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isAcceptationSMS",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAcceptationSMS",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isAutorisationCommunication",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAutorisationCommunication",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isEstMajeur",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setEstMajeur",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getEstSpecialisation",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addEstSpecialisation",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeEstSpecialisation",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getConcernantAnneeScolaire",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addConcernantAnneeScolaire",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeConcernantAnneeScolaire",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 50,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 24,
        "nbMethodsSetters": 21,
        "wmc": 11,
        "ccn": 7,
        "ccnMethodMax": 3,
        "externals": [
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "DateTime",
            "DateTime",
            "Doctrine\\Common\\Collections\\Collection",
            "App\\Entity\\Specialisation",
            "App\\Entity\\Specialisation",
            "Doctrine\\Common\\Collections\\Collection",
            "App\\Entity\\AnneeScolaire",
            "App\\Entity\\AnneeScolaire"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 232,
        "vocabulary": 30,
        "volume": 1138.4,
        "difficulty": 11.69,
        "effort": 13310.51,
        "level": 0.09,
        "bugs": 0.38,
        "time": 739,
        "intelligentContent": 97.36,
        "number_operators": 80,
        "number_operands": 152,
        "number_operators_unique": 4,
        "number_operands_unique": 26,
        "cloc": 41,
        "loc": 309,
        "lloc": 268,
        "mi": 51.43,
        "mIwoC": 24.69,
        "commentWeight": 26.74,
        "kanDefect": 0.57,
        "relativeStructuralComplexity": 49,
        "relativeDataComplexity": 6.19,
        "relativeSystemComplexity": 55.19,
        "totalStructuralComplexity": 2450,
        "totalDataComplexity": 309.38,
        "totalSystemComplexity": 2759.38,
        "package": "App\\Entity\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 5,
        "instability": 0.83,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Medecin",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNom",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNom",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSante",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setSante",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 2,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 0,
        "length": 20,
        "vocabulary": 7,
        "volume": 56.15,
        "difficulty": 2.6,
        "effort": 145.98,
        "level": 0.38,
        "bugs": 0.02,
        "time": 8,
        "intelligentContent": 21.6,
        "number_operators": 7,
        "number_operands": 13,
        "number_operators_unique": 2,
        "number_operands_unique": 5,
        "cloc": 6,
        "loc": 35,
        "lloc": 29,
        "mi": 85.63,
        "mIwoC": 55.72,
        "commentWeight": 29.92,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 5.4,
        "relativeSystemComplexity": 5.4,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 27,
        "totalSystemComplexity": 27,
        "package": "App\\Entity\\",
        "pageRank": 0.05,
        "afferentCoupling": 2,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "App\\Entity\\PasswordResetToken",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUtilisateur",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUtilisateur",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getToken",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setToken",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getExpiresAt",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setExpiresAt",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCreatedAt",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCreatedAt",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isUsed",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUsed",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isExpired",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isValid",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 14,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 6,
        "nbMethodsSetters": 5,
        "wmc": 4,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "DateTime",
            "DateTimeInterface",
            "DateTimeInterface",
            "DateTime"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 54,
        "vocabulary": 11,
        "volume": 186.81,
        "difficulty": 9.14,
        "effort": 1707.97,
        "level": 0.11,
        "bugs": 0.06,
        "time": 95,
        "intelligentContent": 20.43,
        "number_operators": 22,
        "number_operands": 32,
        "number_operators_unique": 4,
        "number_operands_unique": 7,
        "cloc": 10,
        "loc": 82,
        "lloc": 72,
        "mi": 69.06,
        "mIwoC": 43.31,
        "commentWeight": 25.75,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 6.68,
        "relativeSystemComplexity": 7.68,
        "totalStructuralComplexity": 14,
        "totalDataComplexity": 93.5,
        "totalSystemComplexity": 107.5,
        "package": "App\\Entity\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Responsable",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNom",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNom",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPrenom",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPrenom",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getProfession",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setProfession",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCodePostal",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCodePostal",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAdresse",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAdresse",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getVille",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setVille",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTellephone",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTellephone",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getMail",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setMail",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNomEmployeur",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNomEmployeur",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAdresseEmployeur",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAdresseEmployeur",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLienAvecEleve",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setLienAvecEleve",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isAutorisationCommunication",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAutorisationCommunication",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTellDomicile",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTellDomicile",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTellTravail",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTellTravail",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTellMobile",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTellMobile",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isAcceptationSMS",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAcceptationSMS",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFormulaireInscription",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setFormulaireInscription",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getATypeResponsabilite",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addATypeResponsabilite",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeATypeResponsabilite",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 39,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 19,
        "nbMethodsSetters": 17,
        "wmc": 6,
        "ccn": 4,
        "ccnMethodMax": 3,
        "externals": [
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "Doctrine\\Common\\Collections\\Collection",
            "App\\Entity\\TypeResponsable",
            "App\\Entity\\TypeResponsable"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 179,
        "vocabulary": 26,
        "volume": 841.38,
        "difficulty": 10.82,
        "effort": 9102.19,
        "level": 0.09,
        "bugs": 0.28,
        "time": 506,
        "intelligentContent": 77.77,
        "number_operators": 60,
        "number_operands": 119,
        "number_operators_unique": 4,
        "number_operands_unique": 22,
        "cloc": 29,
        "loc": 234,
        "lloc": 205,
        "mi": 54.49,
        "mIwoC": 28.55,
        "commentWeight": 25.94,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 25,
        "relativeDataComplexity": 6.41,
        "relativeSystemComplexity": 31.41,
        "totalStructuralComplexity": 975,
        "totalDataComplexity": 250.17,
        "totalSystemComplexity": 1225.17,
        "package": "App\\Entity\\",
        "pageRank": 0.03,
        "afferentCoupling": 2,
        "efferentCoupling": 3,
        "instability": 0.6,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Sante",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDateDernierRappelVaccinAntitetanique",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDateDernierRappelVaccinAntitetanique",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getObservationParticuliere",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setObservationParticuliere",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAdresse",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAdresse",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTelMedecinTraitant",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTelMedecinTraitant",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFormulaireInscription",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setFormulaireInscription",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSuiviParMedecin",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addSuiviParMedecin",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeSuiviParMedecin",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 15,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 7,
        "nbMethodsSetters": 5,
        "wmc": 6,
        "ccn": 4,
        "ccnMethodMax": 3,
        "externals": [
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "DateTime",
            "Doctrine\\Common\\Collections\\Collection",
            "App\\Entity\\Medecin",
            "App\\Entity\\Medecin"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 72,
        "vocabulary": 14,
        "volume": 274.13,
        "difficulty": 9.6,
        "effort": 2631.64,
        "level": 0.1,
        "bugs": 0.09,
        "time": 146,
        "intelligentContent": 28.56,
        "number_operators": 24,
        "number_operands": 48,
        "number_operators_unique": 4,
        "number_operands_unique": 10,
        "cloc": 17,
        "loc": 102,
        "lloc": 85,
        "mi": 69.86,
        "mIwoC": 40.3,
        "commentWeight": 29.56,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 25,
        "relativeDataComplexity": 2.41,
        "relativeSystemComplexity": 27.41,
        "totalStructuralComplexity": 375,
        "totalDataComplexity": 36.17,
        "totalSystemComplexity": 411.17,
        "package": "App\\Entity\\",
        "pageRank": 0.03,
        "afferentCoupling": 2,
        "efferentCoupling": 4,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "App\\Entity\\ScolariteDes2AnneeAnterieur",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getClasse",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setClasse",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLangueLV1",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setLangueLV1",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLangueLV2",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setLangueLV2",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getOptionMatiere",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setOptionMatiere",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getEtablisement",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setEtablisement",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFormulaireInscription",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setFormulaireInscription",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getConcerneAnneeScolaire",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addConcerneAnneeScolaire",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeConcerneAnneeScolaire",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 17,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 8,
        "nbMethodsSetters": 6,
        "wmc": 6,
        "ccn": 4,
        "ccnMethodMax": 3,
        "externals": [
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "Doctrine\\Common\\Collections\\Collection",
            "App\\Entity\\AnneeScolaire",
            "App\\Entity\\AnneeScolaire"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 82,
        "vocabulary": 15,
        "volume": 320.37,
        "difficulty": 10,
        "effort": 3203.65,
        "level": 0.1,
        "bugs": 0.11,
        "time": 178,
        "intelligentContent": 32.04,
        "number_operators": 27,
        "number_operands": 55,
        "number_operators_unique": 4,
        "number_operands_unique": 11,
        "cloc": 18,
        "loc": 113,
        "lloc": 95,
        "mi": 67.76,
        "mIwoC": 38.78,
        "commentWeight": 28.98,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 25,
        "relativeDataComplexity": 2.75,
        "relativeSystemComplexity": 27.75,
        "totalStructuralComplexity": 425,
        "totalDataComplexity": 46.67,
        "totalSystemComplexity": 471.67,
        "package": "App\\Entity\\",
        "pageRank": 0.03,
        "afferentCoupling": 2,
        "efferentCoupling": 3,
        "instability": 0.6,
        "violations": {}
    },
    {
        "name": "App\\Entity\\SecuriteSociale",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNom",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNom",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAdresse",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAdresse",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFormulaireInscription",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setFormulaireInscription",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 7,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 4,
        "nbMethodsSetters": 3,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 0,
        "length": 29,
        "vocabulary": 8,
        "volume": 87,
        "difficulty": 3.17,
        "effort": 275.5,
        "level": 0.32,
        "bugs": 0.03,
        "time": 15,
        "intelligentContent": 27.47,
        "number_operators": 10,
        "number_operands": 19,
        "number_operators_unique": 2,
        "number_operands_unique": 6,
        "cloc": 7,
        "loc": 46,
        "lloc": 39,
        "mi": 79.99,
        "mIwoC": 51.58,
        "commentWeight": 28.41,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 7.43,
        "relativeSystemComplexity": 7.43,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 52,
        "totalSystemComplexity": 52,
        "package": "App\\Entity\\",
        "pageRank": 0.03,
        "afferentCoupling": 2,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Specialisation",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNom",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNom",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getInformationEleve",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setInformationEleve",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDescription",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDescription",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDuree",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDuree",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNiveau",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNiveau",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDebouches",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDebouches",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getConditionsAdmission",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setConditionsAdmission",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLibelle",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setLibelle",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 17,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 9,
        "nbMethodsSetters": 8,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 0,
        "length": 74,
        "vocabulary": 15,
        "volume": 289.11,
        "difficulty": 3.77,
        "effort": 1089.72,
        "level": 0.27,
        "bugs": 0.1,
        "time": 61,
        "intelligentContent": 76.7,
        "number_operators": 25,
        "number_operands": 49,
        "number_operators_unique": 2,
        "number_operands_unique": 13,
        "cloc": 12,
        "loc": 101,
        "lloc": 89,
        "mi": 65.56,
        "mIwoC": 40.11,
        "commentWeight": 25.45,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 17.47,
        "relativeSystemComplexity": 17.47,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 297,
        "totalSystemComplexity": 297,
        "package": "App\\Entity\\",
        "pageRank": 0.02,
        "afferentCoupling": 4,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Traits\\AdresseTrait",
        "interface": false,
        "abstract": true,
        "final": false,
        "methods": [
            {
                "name": "getAdresse",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAdresse",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCodePostal",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCodePostal",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getVille",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setVille",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAdresseComplete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "hasAdresseComplete",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 3,
        "wmc": 5,
        "ccn": 4,
        "ccnMethodMax": 3,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 46,
        "vocabulary": 14,
        "volume": 175.14,
        "difficulty": 6,
        "effort": 1050.83,
        "level": 0.17,
        "bugs": 0.06,
        "time": 58,
        "intelligentContent": 29.19,
        "number_operators": 16,
        "number_operands": 30,
        "number_operators_unique": 4,
        "number_operands_unique": 10,
        "cloc": 21,
        "loc": 64,
        "lloc": 43,
        "mi": 86.89,
        "mIwoC": 48.12,
        "commentWeight": 38.77,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 8.38,
        "relativeSystemComplexity": 8.38,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 67,
        "totalSystemComplexity": 67,
        "package": "App\\Entity\\Traits\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Traits\\AutorisationsTrait",
        "interface": false,
        "abstract": true,
        "final": false,
        "methods": [
            {
                "name": "getAutorisationDroitImage",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAutorisationDroitImage",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAcceptationSMS",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAcceptationSMS",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAutorisationCommunication",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAutorisationCommunication",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "hasAllAutorisations",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "grantAllAutorisations",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "revokeAllAutorisations",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 9,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 3,
        "wmc": 5,
        "ccn": 3,
        "ccnMethodMax": 3,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 49,
        "vocabulary": 8,
        "volume": 147,
        "difficulty": 13,
        "effort": 1911,
        "level": 0.08,
        "bugs": 0.05,
        "time": 106,
        "intelligentContent": 11.31,
        "number_operators": 23,
        "number_operands": 26,
        "number_operators_unique": 4,
        "number_operands_unique": 4,
        "cloc": 15,
        "loc": 67,
        "lloc": 52,
        "mi": 80.44,
        "mIwoC": 46.99,
        "commentWeight": 33.46,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 9.33,
        "relativeSystemComplexity": 9.33,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 84,
        "totalSystemComplexity": 84,
        "package": "App\\Entity\\Traits\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Traits\\ContactInfoTrait",
        "interface": false,
        "abstract": true,
        "final": false,
        "methods": [
            {
                "name": "getTelephoneMobile",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTelephoneMobile",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTelephoneDomicile",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTelephoneDomicile",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTelephoneTravail",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTelephoneTravail",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getEmail",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setEmail",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTelephonePrincipal",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "hasEmail",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "hasAnyTelephone",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "formatTelephone",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 12,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 4,
        "nbMethodsSetters": 4,
        "wmc": 10,
        "ccn": 7,
        "ccnMethodMax": 3,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 2,
        "length": 94,
        "vocabulary": 25,
        "volume": 436.52,
        "difficulty": 11.67,
        "effort": 5092.76,
        "level": 0.09,
        "bugs": 0.15,
        "time": 283,
        "intelligentContent": 37.42,
        "number_operators": 34,
        "number_operands": 60,
        "number_operators_unique": 7,
        "number_operands_unique": 18,
        "cloc": 33,
        "loc": 100,
        "lloc": 67,
        "mi": 79.59,
        "mIwoC": 40.74,
        "commentWeight": 38.85,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 14.42,
        "relativeSystemComplexity": 14.42,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 173,
        "totalSystemComplexity": 173,
        "package": "App\\Entity\\Traits\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Traits\\DocumentsTrait",
        "interface": false,
        "abstract": true,
        "final": false,
        "methods": [
            {
                "name": "getCarteIdentiteRecto",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCarteIdentiteRecto",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCarteIdentiteVerso",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCarteIdentiteVerso",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getJustificatifDomicile",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setJustificatifDomicile",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getRelevesNotes",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setRelevesNotes",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "hasAllDocuments",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getMissingDocuments",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAllDocumentPaths",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 11,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 4,
        "nbMethodsSetters": 4,
        "wmc": 10,
        "ccn": 8,
        "ccnMethodMax": 5,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 81,
        "vocabulary": 16,
        "volume": 324,
        "difficulty": 11.36,
        "effort": 3681.82,
        "level": 0.09,
        "bugs": 0.11,
        "time": 205,
        "intelligentContent": 28.51,
        "number_operators": 31,
        "number_operands": 50,
        "number_operators_unique": 5,
        "number_operands_unique": 11,
        "cloc": 16,
        "loc": 85,
        "lloc": 69,
        "mi": 72.37,
        "mIwoC": 41.23,
        "commentWeight": 31.13,
        "kanDefect": 0.43,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 11.36,
        "relativeSystemComplexity": 11.36,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 125,
        "totalSystemComplexity": 125,
        "package": "App\\Entity\\Traits\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Traits\\DraftableTrait",
        "interface": false,
        "abstract": true,
        "final": false,
        "methods": [
            {
                "name": "getDraftJson",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDraftJson",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDraftStep",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDraftStep",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDraftUpdatedAt",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDraftUpdatedAt",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDraftData",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDraftData",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "hasDraft",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "clearDraft",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 10,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 3,
        "wmc": 5,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "DateTime"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 48,
        "vocabulary": 9,
        "volume": 152.16,
        "difficulty": 10.8,
        "effort": 1643.29,
        "level": 0.09,
        "bugs": 0.05,
        "time": 91,
        "intelligentContent": 14.09,
        "number_operators": 21,
        "number_operands": 27,
        "number_operators_unique": 4,
        "number_operands_unique": 5,
        "cloc": 18,
        "loc": 76,
        "lloc": 58,
        "mi": 80.21,
        "mIwoC": 45.98,
        "commentWeight": 34.23,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 11.4,
        "relativeSystemComplexity": 11.4,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 114,
        "totalSystemComplexity": 114,
        "package": "App\\Entity\\Traits\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Traits\\EmployeurTrait",
        "interface": false,
        "abstract": true,
        "final": false,
        "methods": [
            {
                "name": "getProfession",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setProfession",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNomEmployeur",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNomEmployeur",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAdresseEmployeur",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAdresseEmployeur",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "hasEmployeur",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getEmployeurComplet",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 3,
        "wmc": 9,
        "ccn": 8,
        "ccnMethodMax": 7,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 53,
        "vocabulary": 15,
        "volume": 207.07,
        "difficulty": 13.56,
        "effort": 2808.32,
        "level": 0.07,
        "bugs": 0.07,
        "time": 156,
        "intelligentContent": 15.27,
        "number_operators": 22,
        "number_operands": 31,
        "number_operators_unique": 7,
        "number_operands_unique": 8,
        "cloc": 21,
        "loc": 69,
        "lloc": 48,
        "mi": 83.75,
        "mIwoC": 46.03,
        "commentWeight": 37.72,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 10.38,
        "relativeSystemComplexity": 10.38,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 83,
        "totalSystemComplexity": 83,
        "package": "App\\Entity\\Traits\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Traits\\NaissanceTrait",
        "interface": false,
        "abstract": true,
        "final": false,
        "methods": [
            {
                "name": "getDateNaissance",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDateNaissance",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNaissanceDepartement",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNaissanceDepartement",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNaissanceCommune",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNaissanceCommune",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNationalite",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNationalite",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLieuNaissanceComplet",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAge",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isMajeur",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 11,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 4,
        "nbMethodsSetters": 4,
        "wmc": 6,
        "ccn": 4,
        "ccnMethodMax": 2,
        "externals": [
            "DateTime"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 58,
        "vocabulary": 17,
        "volume": 237.07,
        "difficulty": 9.82,
        "effort": 2327.62,
        "level": 0.1,
        "bugs": 0.08,
        "time": 129,
        "intelligentContent": 24.15,
        "number_operators": 22,
        "number_operands": 36,
        "number_operators_unique": 6,
        "number_operands_unique": 11,
        "cloc": 16,
        "loc": 77,
        "lloc": 61,
        "mi": 76.33,
        "mIwoC": 43.89,
        "commentWeight": 32.45,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 4.12,
        "relativeSystemComplexity": 8.12,
        "totalStructuralComplexity": 44,
        "totalDataComplexity": 45.33,
        "totalSystemComplexity": 89.33,
        "package": "App\\Entity\\Traits\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Traits\\TransportTrait",
        "interface": false,
        "abstract": true,
        "final": false,
        "methods": [
            {
                "name": "getTransport",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTransport",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTypeTransport",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTypeTransport",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNumeroImmatriculationVehicule",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNumeroImmatriculationVehicule",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "usesPersonalVehicle",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "hasCompleteTransportInfo",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 3,
        "wmc": 7,
        "ccn": 6,
        "ccnMethodMax": 5,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 45,
        "vocabulary": 13,
        "volume": 166.52,
        "difficulty": 7.81,
        "effort": 1300.94,
        "level": 0.13,
        "bugs": 0.06,
        "time": 72,
        "intelligentContent": 21.31,
        "number_operators": 20,
        "number_operands": 25,
        "number_operators_unique": 5,
        "number_operands_unique": 8,
        "cloc": 15,
        "loc": 66,
        "lloc": 51,
        "mi": 80.05,
        "mIwoC": 46.39,
        "commentWeight": 33.66,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 5.69,
        "relativeSystemComplexity": 6.69,
        "totalStructuralComplexity": 8,
        "totalDataComplexity": 45.5,
        "totalSystemComplexity": 53.5,
        "package": "App\\Entity\\Traits\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "App\\Entity\\TypeResponsable",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNom",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNom",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getResponsable",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setResponsable",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 2,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [],
        "parents": [],
        "implements": [],
        "lcom": 0,
        "length": 20,
        "vocabulary": 7,
        "volume": 56.15,
        "difficulty": 2.6,
        "effort": 145.98,
        "level": 0.38,
        "bugs": 0.02,
        "time": 8,
        "intelligentContent": 21.6,
        "number_operators": 7,
        "number_operands": 13,
        "number_operators_unique": 2,
        "number_operands_unique": 5,
        "cloc": 6,
        "loc": 35,
        "lloc": 29,
        "mi": 85.63,
        "mIwoC": 55.72,
        "commentWeight": 29.92,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 5.4,
        "relativeSystemComplexity": 5.4,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 27,
        "totalSystemComplexity": 27,
        "package": "App\\Entity\\",
        "pageRank": 0.06,
        "afferentCoupling": 2,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "App\\Entity\\Utilisateur",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getEmail",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setEmail",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getMotDePasse",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setMotDePasse",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getRoles",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setRoles",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDateCreation",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDateCreation",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNom",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setNom",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPrenom",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPrenom",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTelephone",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTelephone",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUser",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUser",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDateNaissance",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDateNaissance",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAdresse",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAdresse",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDepartement",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDepartement",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFormulaireInscriptions",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addFormulaireInscription",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeFormulaireInscription",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getContacts",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addContact",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeContact",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getContientInformationEleve",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setContientInformationEleve",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUserIdentifier",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPassword",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "eraseCredentials",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 35,
        "nbMethods": 7,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 7,
        "nbMethodsGetter": 16,
        "nbMethodsSetters": 12,
        "wmc": 15,
        "ccn": 9,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Component\\Security\\Core\\User\\UserInterface",
            "Symfony\\Component\\Security\\Core\\User\\PasswordAuthenticatedUserInterface",
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "DateTime",
            "DateTime",
            "Doctrine\\Common\\Collections\\Collection",
            "App\\Entity\\FormulaireInscription",
            "App\\Entity\\FormulaireInscription",
            "Doctrine\\Common\\Collections\\Collection",
            "App\\Entity\\Contact",
            "App\\Entity\\Contact"
        ],
        "parents": [],
        "implements": [
            "Symfony\\Component\\Security\\Core\\User\\UserInterface",
            "Symfony\\Component\\Security\\Core\\User\\PasswordAuthenticatedUserInterface"
        ],
        "lcom": 2,
        "length": 178,
        "vocabulary": 28,
        "volume": 855.71,
        "difficulty": 12.93,
        "effort": 11068.41,
        "level": 0.08,
        "bugs": 0.29,
        "time": 615,
        "intelligentContent": 66.16,
        "number_operators": 59,
        "number_operands": 119,
        "number_operators_unique": 5,
        "number_operands_unique": 23,
        "cloc": 34,
        "loc": 227,
        "lloc": 193,
        "mi": 56.61,
        "mIwoC": 28.4,
        "commentWeight": 28.21,
        "kanDefect": 0.64,
        "relativeStructuralComplexity": 49,
        "relativeDataComplexity": 4.18,
        "relativeSystemComplexity": 53.18,
        "totalStructuralComplexity": 1715,
        "totalDataComplexity": 146.38,
        "totalSystemComplexity": 1861.38,
        "package": "App\\Entity\\",
        "pageRank": 0.04,
        "afferentCoupling": 6,
        "efferentCoupling": 7,
        "instability": 0.54,
        "violations": {}
    },
    {
        "name": "App\\Form\\AdhesionMDLType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 2,
        "length": 12,
        "vocabulary": 10,
        "volume": 39.86,
        "difficulty": 0,
        "effort": 0,
        "level": 1.67,
        "bugs": 0.01,
        "time": 0,
        "intelligentContent": 66.44,
        "number_operators": 0,
        "number_operands": 12,
        "number_operators_unique": 0,
        "number_operands_unique": 10,
        "cloc": 0,
        "loc": 12,
        "lloc": 12,
        "mi": 65.12,
        "mIwoC": 65.12,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 9.38,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 0.75,
        "totalSystemComplexity": 18.75,
        "package": "App\\Form\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Form\\AnneeScolaireType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 2,
        "length": 15,
        "vocabulary": 10,
        "volume": 49.83,
        "difficulty": 0,
        "effort": 0,
        "level": 1.33,
        "bugs": 0.02,
        "time": 0,
        "intelligentContent": 66.44,
        "number_operators": 0,
        "number_operands": 15,
        "number_operators_unique": 0,
        "number_operands_unique": 10,
        "cloc": 0,
        "loc": 12,
        "lloc": 12,
        "mi": 64.44,
        "mIwoC": 64.44,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 9.38,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 0.75,
        "totalSystemComplexity": 18.75,
        "package": "App\\Form\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Form\\AssuranceScolaireType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 2,
        "length": 13,
        "vocabulary": 11,
        "volume": 44.97,
        "difficulty": 0,
        "effort": 0,
        "level": 1.69,
        "bugs": 0.01,
        "time": 0,
        "intelligentContent": 76.11,
        "number_operators": 0,
        "number_operands": 13,
        "number_operators_unique": 0,
        "number_operands_unique": 11,
        "cloc": 0,
        "loc": 12,
        "lloc": 12,
        "mi": 64.75,
        "mIwoC": 64.75,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 9.38,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 0.75,
        "totalSystemComplexity": 18.75,
        "package": "App\\Form\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Form\\ContactType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 2,
        "length": 150,
        "vocabulary": 63,
        "volume": 896.59,
        "difficulty": 0,
        "effort": 0,
        "level": 0.84,
        "bugs": 0.3,
        "time": 0,
        "intelligentContent": 753.14,
        "number_operators": 0,
        "number_operands": 150,
        "number_operators_unique": 0,
        "number_operands_unique": 63,
        "cloc": 0,
        "loc": 12,
        "lloc": 12,
        "mi": 55.65,
        "mIwoC": 55.65,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 9.38,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 0.75,
        "totalSystemComplexity": 18.75,
        "package": "App\\Form\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Form\\FormulaireInscriptionType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 2,
        "length": 14,
        "vocabulary": 12,
        "volume": 50.19,
        "difficulty": 0,
        "effort": 0,
        "level": 1.71,
        "bugs": 0.02,
        "time": 0,
        "intelligentContent": 86.04,
        "number_operators": 0,
        "number_operands": 14,
        "number_operators_unique": 0,
        "number_operands_unique": 12,
        "cloc": 0,
        "loc": 12,
        "lloc": 12,
        "mi": 64.42,
        "mIwoC": 64.42,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 9.38,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 0.75,
        "totalSystemComplexity": 18.75,
        "package": "App\\Form\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Form\\InformationEleveType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 2,
        "length": 27,
        "vocabulary": 25,
        "volume": 125.38,
        "difficulty": 0,
        "effort": 0,
        "level": 1.85,
        "bugs": 0.04,
        "time": 0,
        "intelligentContent": 232.19,
        "number_operators": 0,
        "number_operands": 27,
        "number_operators_unique": 0,
        "number_operands_unique": 25,
        "cloc": 0,
        "loc": 12,
        "lloc": 12,
        "mi": 61.63,
        "mIwoC": 61.63,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 9.38,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 0.75,
        "totalSystemComplexity": 18.75,
        "package": "App\\Form\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Form\\MedecinType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 2,
        "length": 11,
        "vocabulary": 9,
        "volume": 34.87,
        "difficulty": 0,
        "effort": 0,
        "level": 1.64,
        "bugs": 0.01,
        "time": 0,
        "intelligentContent": 57.06,
        "number_operators": 0,
        "number_operands": 11,
        "number_operators_unique": 0,
        "number_operands_unique": 9,
        "cloc": 0,
        "loc": 12,
        "lloc": 12,
        "mi": 65.52,
        "mIwoC": 65.52,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 9.38,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 0.75,
        "totalSystemComplexity": 18.75,
        "package": "App\\Form\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Form\\ResponsableType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 2,
        "length": 26,
        "vocabulary": 24,
        "volume": 119.21,
        "difficulty": 0,
        "effort": 0,
        "level": 1.85,
        "bugs": 0.04,
        "time": 0,
        "intelligentContent": 220.08,
        "number_operators": 0,
        "number_operands": 26,
        "number_operators_unique": 0,
        "number_operands_unique": 24,
        "cloc": 0,
        "loc": 12,
        "lloc": 12,
        "mi": 61.79,
        "mIwoC": 61.79,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 9.38,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 0.75,
        "totalSystemComplexity": 18.75,
        "package": "App\\Form\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Form\\SanteType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 2,
        "length": 14,
        "vocabulary": 12,
        "volume": 50.19,
        "difficulty": 0,
        "effort": 0,
        "level": 1.71,
        "bugs": 0.02,
        "time": 0,
        "intelligentContent": 86.04,
        "number_operators": 0,
        "number_operands": 14,
        "number_operators_unique": 0,
        "number_operands_unique": 12,
        "cloc": 0,
        "loc": 12,
        "lloc": 12,
        "mi": 64.42,
        "mIwoC": 64.42,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 9.38,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 0.75,
        "totalSystemComplexity": 18.75,
        "package": "App\\Form\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Form\\ScolariteDes2AnneeAnterieurType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 2,
        "length": 15,
        "vocabulary": 13,
        "volume": 55.51,
        "difficulty": 0,
        "effort": 0,
        "level": 1.73,
        "bugs": 0.02,
        "time": 0,
        "intelligentContent": 96.21,
        "number_operators": 0,
        "number_operands": 15,
        "number_operators_unique": 0,
        "number_operands_unique": 13,
        "cloc": 0,
        "loc": 12,
        "lloc": 12,
        "mi": 64.11,
        "mIwoC": 64.11,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 9.38,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 0.75,
        "totalSystemComplexity": 18.75,
        "package": "App\\Form\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Form\\SecuriteSocialeType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 2,
        "length": 12,
        "vocabulary": 10,
        "volume": 39.86,
        "difficulty": 0,
        "effort": 0,
        "level": 1.67,
        "bugs": 0.01,
        "time": 0,
        "intelligentContent": 66.44,
        "number_operators": 0,
        "number_operands": 12,
        "number_operators_unique": 0,
        "number_operands_unique": 10,
        "cloc": 0,
        "loc": 12,
        "lloc": 12,
        "mi": 65.12,
        "mIwoC": 65.12,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 9.38,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 0.75,
        "totalSystemComplexity": 18.75,
        "package": "App\\Form\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Form\\SpecialisationType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 2,
        "length": 11,
        "vocabulary": 9,
        "volume": 34.87,
        "difficulty": 0,
        "effort": 0,
        "level": 1.64,
        "bugs": 0.01,
        "time": 0,
        "intelligentContent": 57.06,
        "number_operators": 0,
        "number_operands": 11,
        "number_operators_unique": 0,
        "number_operands_unique": 9,
        "cloc": 0,
        "loc": 12,
        "lloc": 12,
        "mi": 65.52,
        "mIwoC": 65.52,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 9.38,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 0.75,
        "totalSystemComplexity": 18.75,
        "package": "App\\Form\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Form\\TypeResponsableType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 2,
        "length": 11,
        "vocabulary": 9,
        "volume": 34.87,
        "difficulty": 0,
        "effort": 0,
        "level": 1.64,
        "bugs": 0.01,
        "time": 0,
        "intelligentContent": 57.06,
        "number_operators": 0,
        "number_operands": 11,
        "number_operators_unique": 0,
        "number_operands_unique": 9,
        "cloc": 0,
        "loc": 12,
        "lloc": 12,
        "mi": 65.52,
        "mIwoC": 65.52,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 9.38,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 0.75,
        "totalSystemComplexity": 18.75,
        "package": "App\\Form\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Form\\UtilisateurType",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "parents": [
            "Symfony\\Component\\Form\\AbstractType"
        ],
        "implements": [],
        "lcom": 2,
        "length": 21,
        "vocabulary": 19,
        "volume": 89.21,
        "difficulty": 0,
        "effort": 0,
        "level": 1.81,
        "bugs": 0.03,
        "time": 0,
        "intelligentContent": 161.42,
        "number_operators": 0,
        "number_operands": 21,
        "number_operators_unique": 0,
        "number_operands_unique": 19,
        "cloc": 0,
        "loc": 12,
        "lloc": 12,
        "mi": 62.67,
        "mIwoC": 62.67,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.38,
        "relativeSystemComplexity": 9.38,
        "totalStructuralComplexity": 18,
        "totalDataComplexity": 0.75,
        "totalSystemComplexity": 18.75,
        "package": "App\\Form\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Kernel",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "boot",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Symfony\\Component\\HttpKernel\\Kernel"
        ],
        "parents": [
            "Symfony\\Component\\HttpKernel\\Kernel"
        ],
        "implements": [],
        "lcom": 1,
        "length": 1,
        "vocabulary": 1,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 2,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 1,
        "number_operators_unique": 0,
        "number_operands_unique": 1,
        "cloc": 1,
        "loc": 11,
        "lloc": 10,
        "mi": 193.51,
        "mIwoC": 171,
        "commentWeight": 22.51,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0,
        "relativeSystemComplexity": 1,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0,
        "totalSystemComplexity": 1,
        "package": "App\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Message\\ContactMessage",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCivilite",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNom",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPrenom",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getEmail",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTelephone",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSujet",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getMessage",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "hasConsent",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCreatedAt",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 10,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 9,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "DateTimeImmutable",
            "DateTimeImmutable"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 67,
        "vocabulary": 24,
        "volume": 307.19,
        "difficulty": 2.23,
        "effort": 684.2,
        "level": 0.45,
        "bugs": 0.1,
        "time": 38,
        "intelligentContent": 137.92,
        "number_operators": 18,
        "number_operands": 49,
        "number_operators_unique": 2,
        "number_operands_unique": 22,
        "cloc": 14,
        "loc": 75,
        "lloc": 61,
        "mi": 74.53,
        "mIwoC": 43.5,
        "commentWeight": 31.02,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 9.8,
        "relativeSystemComplexity": 9.8,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 98,
        "totalSystemComplexity": 98,
        "package": "App\\Message\\",
        "pageRank": 0.01,
        "afferentCoupling": 2,
        "efferentCoupling": 1,
        "instability": 0.33,
        "violations": {}
    },
    {
        "name": "App\\MessageHandler\\ContactMessageHandler",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__invoke",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 4,
        "ccn": 3,
        "ccnMethodMax": 3,
        "externals": [
            "Symfony\\Component\\Mailer\\MailerInterface",
            "Psr\\Log\\LoggerInterface",
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Message\\ContactMessage",
            "App\\Entity\\Contact",
            "Symfony\\Component\\Mime\\Address",
            "Symfony\\Bridge\\Twig\\Mime\\TemplatedEmail"
        ],
        "parents": [],
        "implements": [],
        "lcom": 2,
        "length": 100,
        "vocabulary": 42,
        "volume": 539.23,
        "difficulty": 4.84,
        "effort": 2611.02,
        "level": 0.21,
        "bugs": 0.18,
        "time": 145,
        "intelligentContent": 111.36,
        "number_operators": 8,
        "number_operands": 92,
        "number_operators_unique": 4,
        "number_operands_unique": 38,
        "cloc": 13,
        "loc": 57,
        "lloc": 44,
        "mi": 78.33,
        "mIwoC": 44.62,
        "commentWeight": 33.71,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 1296,
        "relativeDataComplexity": 0.08,
        "relativeSystemComplexity": 1296.08,
        "totalStructuralComplexity": 2592,
        "totalDataComplexity": 0.16,
        "totalSystemComplexity": 2592.16,
        "package": "App\\MessageHandler\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 7,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Repository\\AdhesionMDLRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 1,
        "length": 2,
        "vocabulary": 1,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 2,
        "number_operators_unique": 0,
        "number_operands_unique": 1,
        "cloc": 27,
        "loc": 34,
        "lloc": 8,
        "mi": 220.1,
        "mIwoC": 171,
        "commentWeight": 49.1,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "App\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "App\\Repository\\AnneeScolaireRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 1,
        "length": 2,
        "vocabulary": 1,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 2,
        "number_operators_unique": 0,
        "number_operands_unique": 1,
        "cloc": 27,
        "loc": 34,
        "lloc": 8,
        "mi": 220.1,
        "mIwoC": 171,
        "commentWeight": 49.1,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "App\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "App\\Repository\\AssuranceScolaireRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 1,
        "length": 2,
        "vocabulary": 1,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 2,
        "number_operators_unique": 0,
        "number_operands_unique": 1,
        "cloc": 27,
        "loc": 34,
        "lloc": 8,
        "mi": 220.1,
        "mIwoC": 171,
        "commentWeight": 49.1,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "App\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "App\\Repository\\ContactRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "save",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "remove",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 5,
        "ccn": 3,
        "ccnMethodMax": 2,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry",
            "App\\Entity\\Contact",
            "App\\Entity\\Contact"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 2,
        "length": 16,
        "vocabulary": 5,
        "volume": 37.15,
        "difficulty": 1.75,
        "effort": 65.01,
        "level": 0.57,
        "bugs": 0.01,
        "time": 4,
        "intelligentContent": 21.23,
        "number_operators": 2,
        "number_operands": 14,
        "number_operators_unique": 1,
        "number_operands_unique": 4,
        "cloc": 3,
        "loc": 25,
        "lloc": 22,
        "mi": 84.88,
        "mIwoC": 59.32,
        "commentWeight": 25.56,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 25,
        "relativeDataComplexity": 0.28,
        "relativeSystemComplexity": 25.28,
        "totalStructuralComplexity": 75,
        "totalDataComplexity": 0.83,
        "totalSystemComplexity": 75.83,
        "package": "App\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Repository\\FormulaireInscriptionRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 1,
        "length": 2,
        "vocabulary": 1,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 2,
        "number_operators_unique": 0,
        "number_operands_unique": 1,
        "cloc": 27,
        "loc": 34,
        "lloc": 8,
        "mi": 220.1,
        "mIwoC": 171,
        "commentWeight": 49.1,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "App\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "App\\Repository\\InformationEleveRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 1,
        "length": 2,
        "vocabulary": 1,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 2,
        "number_operators_unique": 0,
        "number_operands_unique": 1,
        "cloc": 27,
        "loc": 34,
        "lloc": 8,
        "mi": 220.1,
        "mIwoC": 171,
        "commentWeight": 49.1,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "App\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "App\\Repository\\MedecinRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 1,
        "length": 2,
        "vocabulary": 1,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 2,
        "number_operators_unique": 0,
        "number_operands_unique": 1,
        "cloc": 27,
        "loc": 34,
        "lloc": 8,
        "mi": 220.1,
        "mIwoC": 171,
        "commentWeight": 49.1,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "App\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "App\\Repository\\PasswordResetTokenRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findValidToken",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deleteExpiredTokens",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 3,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry",
            "DateTime",
            "DateTime"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 2,
        "length": 20,
        "vocabulary": 12,
        "volume": 71.7,
        "difficulty": 0.86,
        "effort": 61.92,
        "level": 1.16,
        "bugs": 0.02,
        "time": 3,
        "intelligentContent": 83.02,
        "number_operators": 1,
        "number_operands": 19,
        "number_operators_unique": 1,
        "number_operands_unique": 11,
        "cloc": 3,
        "loc": 19,
        "lloc": 16,
        "mi": 89.48,
        "mIwoC": 60.61,
        "commentWeight": 28.87,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 169,
        "relativeDataComplexity": 0.12,
        "relativeSystemComplexity": 169.12,
        "totalStructuralComplexity": 507,
        "totalDataComplexity": 0.36,
        "totalSystemComplexity": 507.36,
        "package": "App\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "App\\Repository\\ResponsableRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 1,
        "length": 2,
        "vocabulary": 1,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 2,
        "number_operators_unique": 0,
        "number_operands_unique": 1,
        "cloc": 27,
        "loc": 34,
        "lloc": 8,
        "mi": 220.1,
        "mIwoC": 171,
        "commentWeight": 49.1,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "App\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "App\\Repository\\SanteRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 1,
        "length": 2,
        "vocabulary": 1,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 2,
        "number_operators_unique": 0,
        "number_operands_unique": 1,
        "cloc": 27,
        "loc": 34,
        "lloc": 8,
        "mi": 220.1,
        "mIwoC": 171,
        "commentWeight": 49.1,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "App\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "App\\Repository\\ScolariteDes2AnneeAnterieurRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 1,
        "length": 2,
        "vocabulary": 1,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 2,
        "number_operators_unique": 0,
        "number_operands_unique": 1,
        "cloc": 27,
        "loc": 34,
        "lloc": 8,
        "mi": 220.1,
        "mIwoC": 171,
        "commentWeight": 49.1,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "App\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "App\\Repository\\SecuriteSocialeRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 1,
        "length": 2,
        "vocabulary": 1,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 2,
        "number_operators_unique": 0,
        "number_operands_unique": 1,
        "cloc": 27,
        "loc": 34,
        "lloc": 8,
        "mi": 220.1,
        "mIwoC": 171,
        "commentWeight": 49.1,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "App\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "App\\Repository\\SpecialisationRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 1,
        "length": 2,
        "vocabulary": 1,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 2,
        "number_operators_unique": 0,
        "number_operands_unique": 1,
        "cloc": 27,
        "loc": 34,
        "lloc": 8,
        "mi": 220.1,
        "mIwoC": 171,
        "commentWeight": 49.1,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "App\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 2,
        "efferentCoupling": 2,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "App\\Repository\\TypeResponsableRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 1,
        "length": 2,
        "vocabulary": 1,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 2,
        "number_operators_unique": 0,
        "number_operands_unique": 1,
        "cloc": 27,
        "loc": 34,
        "lloc": 8,
        "mi": 220.1,
        "mIwoC": 171,
        "commentWeight": 49.1,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "App\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "App\\Repository\\UtilisateurRepository",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 1,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository",
            "Doctrine\\Persistence\\ManagerRegistry"
        ],
        "parents": [
            "Doctrine\\Bundle\\DoctrineBundle\\Repository\\ServiceEntityRepository"
        ],
        "implements": [],
        "lcom": 1,
        "length": 2,
        "vocabulary": 1,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 2,
        "number_operators_unique": 0,
        "number_operands_unique": 1,
        "cloc": 27,
        "loc": 34,
        "lloc": 8,
        "mi": 220.1,
        "mIwoC": 171,
        "commentWeight": 49.1,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "package": "App\\Repository\\",
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "App\\Service\\FormDataPreparationService",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "getDefaultDataFromUser",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "mergeBrouillonData",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "prepareSavedDataJson",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 17,
        "ccn": 15,
        "ccnMethodMax": 8,
        "externals": [
            "App\\Entity\\Utilisateur",
            "App\\Entity\\FormulaireInscription",
            "App\\Entity\\Utilisateur"
        ],
        "parents": [],
        "implements": [],
        "lcom": 1,
        "length": 94,
        "vocabulary": 28,
        "volume": 451.89,
        "difficulty": 9.41,
        "effort": 4251.89,
        "level": 0.11,
        "bugs": 0.15,
        "time": 236,
        "intelligentContent": 48.03,
        "number_operators": 25,
        "number_operands": 69,
        "number_operators_unique": 6,
        "number_operands_unique": 22,
        "cloc": 11,
        "loc": 46,
        "lloc": 35,
        "mi": 80.07,
        "mIwoC": 45.71,
        "commentWeight": 34.36,
        "kanDefect": 0.5,
        "relativeStructuralComplexity": 289,
        "relativeDataComplexity": 0.31,
        "relativeSystemComplexity": 289.31,
        "totalStructuralComplexity": 867,
        "totalDataComplexity": 0.94,
        "totalSystemComplexity": 867.94,
        "package": "App\\Service\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Service\\FormulaireInscriptionService",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findBrouillon",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findDossierSoumis",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findByTypeAndUser",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "canBeModified",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "deleteBrouillon",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createBrouillon",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "saveProgress",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 8,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 8,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 11,
        "ccn": 4,
        "ccnMethodMax": 2,
        "externals": [
            "Doctrine\\ORM\\EntityManagerInterface",
            "App\\Entity\\Utilisateur",
            "App\\Entity\\Utilisateur",
            "App\\Entity\\Utilisateur",
            "App\\Entity\\Utilisateur",
            "App\\Entity\\FormulaireInscription",
            "App\\Entity\\Utilisateur",
            "App\\Entity\\FormulaireInscription",
            "DateTime",
            "App\\Entity\\FormulaireInscription",
            "DateTime"
        ],
        "parents": [],
        "implements": [],
        "lcom": 3,
        "length": 92,
        "vocabulary": 20,
        "volume": 397.62,
        "difficulty": 6.53,
        "effort": 2596.21,
        "level": 0.15,
        "bugs": 0.13,
        "time": 144,
        "intelligentContent": 60.9,
        "number_operators": 18,
        "number_operands": 74,
        "number_operators_unique": 3,
        "number_operands_unique": 17,
        "cloc": 23,
        "loc": 84,
        "lloc": 61,
        "mi": 78.55,
        "mIwoC": 42.32,
        "commentWeight": 36.24,
        "kanDefect": 0.36,
        "relativeStructuralComplexity": 225,
        "relativeDataComplexity": 0.59,
        "relativeSystemComplexity": 225.59,
        "totalStructuralComplexity": 1800,
        "totalDataComplexity": 4.75,
        "totalSystemComplexity": 1804.75,
        "package": "App\\Service\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Service\\FormulaireStatutService",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "isBrouillon",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isValide",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isModifiable",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isFinalise",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "canDownloadPdf",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStatutLabel",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStatutBadgeClass",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isComplet",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getEtapesManquantes",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 9,
        "nbMethods": 9,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 9,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 15,
        "ccn": 7,
        "ccnMethodMax": 4,
        "externals": [
            "App\\Entity\\FormulaireInscription",
            "App\\Entity\\FormulaireInscription",
            "App\\Entity\\FormulaireInscription",
            "App\\Entity\\FormulaireInscription",
            "App\\Entity\\FormulaireInscription",
            "App\\Entity\\FormulaireInscription",
            "App\\Entity\\FormulaireInscription"
        ],
        "parents": [],
        "implements": [],
        "lcom": 8,
        "length": 79,
        "vocabulary": 30,
        "volume": 387.64,
        "difficulty": 4.15,
        "effort": 1610.22,
        "level": 0.24,
        "bugs": 0.13,
        "time": 89,
        "intelligentContent": 93.32,
        "number_operators": 25,
        "number_operands": 54,
        "number_operators_unique": 4,
        "number_operands_unique": 26,
        "cloc": 33,
        "loc": 117,
        "lloc": 84,
        "mi": 75.61,
        "mIwoC": 38.96,
        "commentWeight": 36.65,
        "kanDefect": 0.57,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 1.86,
        "relativeSystemComplexity": 37.86,
        "totalStructuralComplexity": 324,
        "totalDataComplexity": 16.71,
        "totalSystemComplexity": 340.71,
        "package": "App\\Service\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Service\\PdfGenerationService",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "findLibreOfficePath",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "replaceVariable",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "generatePdfFilename",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "createDownloadResponse",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "convertOdtToPdf",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 13,
        "ccn": 9,
        "ccnMethodMax": 4,
        "externals": [
            "App\\Entity\\FormulaireInscription",
            "Symfony\\Component\\HttpFoundation\\BinaryFileResponse",
            "Symfony\\Component\\HttpFoundation\\BinaryFileResponse"
        ],
        "parents": [],
        "implements": [],
        "lcom": 4,
        "length": 93,
        "vocabulary": 46,
        "volume": 513.69,
        "difficulty": 6.19,
        "effort": 3180.93,
        "level": 0.16,
        "bugs": 0.17,
        "time": 177,
        "intelligentContent": 82.96,
        "number_operators": 24,
        "number_operands": 69,
        "number_operators_unique": 7,
        "number_operands_unique": 39,
        "cloc": 16,
        "loc": 64,
        "lloc": 48,
        "mi": 78.11,
        "mIwoC": 43.13,
        "commentWeight": 34.97,
        "kanDefect": 0.59,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 1.37,
        "relativeSystemComplexity": 37.37,
        "totalStructuralComplexity": 180,
        "totalDataComplexity": 6.86,
        "totalSystemComplexity": 186.86,
        "package": "App\\Service\\",
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    }
]