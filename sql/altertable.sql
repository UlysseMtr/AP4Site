alter table Facture
ADD CONSTRAINT FK_Facture_Ligue FOREIGN KEY Facture(codeclient) REFERENCES Ligue(codeclient);

alter table LigneFacture
ADD CONSTRAINT FK_LigneFacture_Facture FOREIGN KEY LigneFacture(numfact) REFERENCES Facture(numfact);

alter table LigneFacture
ADD CONSTRAINT FK_LigneFacture_presta FOREIGN KEY LigneFacture(codepresta) REFERENCES presta(codepresta);