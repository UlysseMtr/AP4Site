CREATE TABLE Ligue (
    codeclient int ,
    ligue varchar(250),
    nom varchar(250),
    adresse varchar(250),
    recevoir boolean,
    sport varchar(250),
    CONSTRAINT PK_Ligue PRIMARY KEY (codeclient)
);


CREATE TABLE compteadmin(
    id int,
    mdp varchar(250),
    CONSTRAINT PK_compteadmin PRIMARY KEY (id)
);

CREATE TABLE Facture (
    numfact int,
    date DATE,
    echeance DATE,
    codeclient int,
    CONSTRAINT PK_Facture PRIMARY KEY (numfact)
);
CREATE TABLE LigneFacture (
    numfact int,
    codepresta varchar(250),
    quantitie int,
    CONSTRAINT PK_LigneFacture PRIMARY KEY (numfact , codepresta )
);
CREATE TABLE presta (
    codepresta varchar(250),
    libelle varchar(250),
    prix float,
    CONSTRAINT PK_presta PRIMARY KEY (codepresta )
);

