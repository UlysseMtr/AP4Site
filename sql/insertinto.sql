INSERT INTO Ligue
    VALUE(411007,"Ligue Lorraine Escrime","Valérie LAHEURTE","14 alle renoir" , true , "Escrime"),
         (411008,"Ligue Lorraine de Football","Pierre LENOIR","15 alle renoir", false , "Football"),
          (411009,"Ligue Lorraine de Basket","Mohamed BOURGARD","13 alle renoir" , true , "Basket"),
          (411010,"Ligue Lorraine de Babyfoot","Monieur TEST","16 alle renoir" , true , "BabyFoot");



INSERT INTO presta
    VALUE("AFFRAN","Affranchissement", 3.33),
         ("PHOTOCOULEUR","Photocopie en couleur", 0.240),
          ("PHOTON","Photocopie en noir et blanc", 0.055);

INSERT INTO Facture
    VALUE(5175 ,"2012-02-12","2012-02-29",411009);

INSERT INTO LigneFacture
    VALUE(5175,"AFFRAN", 1),
         (5175,"PHOTOCOULEUR", 166),
          (5175,"PHOTON", 889);