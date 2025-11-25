-- Mise à jour BTS Comptabilité
UPDATE specialisation SET 
    libelle = 'BTS Comptabilité et Gestion',
    description = 'Le BTS CG forme des techniciens supérieurs comptables capables d''organiser et de réaliser la gestion des obligations comptables, fiscales et sociales. Les diplômés maîtrisent les outils informatiques de gestion et de comptabilité.',
    duree = '2 ans',
    niveau = 'Bac+2',
    debouches = 'Comptable, Assistant de gestion PME-PMI, Gestionnaire de paie, Contrôleur de gestion junior, Collaborateur en cabinet d''expertise comptable',
    conditions_admission = 'Baccalauréat STMG, général (spécialité mathématiques recommandée) ou professionnel gestion-administration. Admission sur dossier.'
WHERE id = 3;

-- Mise à jour BTS Électrotechnique
UPDATE specialisation SET 
    libelle = 'BTS Électrotechnique',
    description = 'Le BTS Électrotechnique forme des techniciens capables de concevoir, réaliser et maintenir des équipements électriques. Cette formation couvre la production, le transport, la distribution et l''utilisation de l''énergie électrique.',
    duree = '2 ans',
    niveau = 'Bac+2',
    debouches = 'Technicien électrotechnicien, Chargé d''affaires, Responsable de chantier, Technicien de maintenance, Chef de projet en installation électrique',
    conditions_admission = 'Baccalauréat STI2D, général avec spécialités scientifiques ou professionnel MELEC. Bon niveau en mathématiques et physique requis.'
WHERE id = 4;

-- Mise à jour BTS Tourisme
UPDATE specialisation SET 
    libelle = 'BTS Tourisme',
    description = 'Le BTS Tourisme forme des professionnels polyvalents capables d''informer et conseiller les clients, de créer et promouvoir des produits touristiques, d''accueillir et accompagner des touristes. La maîtrise de deux langues étrangères est indispensable.',
    duree = '2 ans',
    niveau = 'Bac+2',
    debouches = 'Conseiller voyages, Agent de comptoir, Guide accompagnateur, Animateur de tourisme local, Chef de produit touristique, Yield manager',
    conditions_admission = 'Baccalauréat toutes séries avec un bon niveau en langues étrangères (deux langues obligatoires). Admission sur dossier et entretien en langues.'
WHERE id = 5;

-- Mise à jour BTS Communication
UPDATE specialisation SET 
    libelle = 'BTS Communication',
    description = 'Le BTS Communication forme des professionnels de la communication capables de concevoir et mettre en œuvre des opérations de communication dans tous les secteurs. La formation couvre la publicité, les relations publiques, la communication digitale et événementielle.',
    duree = '2 ans',
    niveau = 'Bac+2',
    debouches = 'Chargé de communication, Assistant chef de publicité, Community manager, Chargé de relations publiques, Organisateur d''événements',
    conditions_admission = 'Baccalauréat toutes séries avec une bonne culture générale et de bonnes capacités rédactionnelles. Admission sur dossier, tests et entretien.'
WHERE id = 6;
