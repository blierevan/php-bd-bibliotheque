CREATE TABLE tbl_typeL(
   Id INT AUTO_INCREMENT,
   libelle VARCHAR(50),
   PRIMARY KEY(Id)
);

CREATE TABLE tbl_genre(
   Id INT AUTO_INCREMENT,
   libelle VARCHAR(50),
   PRIMARY KEY(Id)
);

CREATE TABLE tbl_editeur(
   Id INT AUTO_INCREMENT,
   nom VARCHAR(50),
   PRIMARY KEY(Id)
);

CREATE TABLE tbl_pays(
   Id INT AUTO_INCREMENT,
   nom_p VARCHAR(50),
   PRIMARY KEY(Id)
);

CREATE TABLE tbl_ville(
   Id INT AUTO_INCREMENT,
   Code_postal CHAR(4),
   nom VARCHAR(50),
   PRIMARY KEY(Id)
);

CREATE TABLE tbl_rencontre(
   Id INT AUTO_INCREMENT,
   date_heure DATETIME,
   PRIMARY KEY(Id)
);

CREATE TABLE tbl_rayons(
   Id INT AUTO_INCREMENT,
   localisation VARCHAR(50),
   PRIMARY KEY(Id)
);

CREATE TABLE tbl_livre(
   id_l INT AUTO_INCREMENT,
   titre_l VARCHAR(50),
   ISBN VARCHAR(13),
   annee_l VARCHAR(4),
   resume_l TEXT,
   Id_type_de_livre INT,
   PRIMARY KEY(id_l),
   FOREIGN KEY(Id_type_de_livre) REFERENCES tbl_typeL(Id)
);

CREATE TABLE tbl_personne(
   Id INT AUTO_INCREMENT,
   nom VARCHAR(50),
   prenom VARCHAR(50),
   rue VARCHAR(50),
   email VARCHAR(50),
   date_naissance VARCHAR(50),
   pays VARCHAR(50),
   Id_Pays INT NOT NULL,
   PRIMARY KEY(Id),
   FOREIGN KEY(Id_Pays) REFERENCES tbl_pays(Id)
);

CREATE TABLE tbl_inscrit(
   Numéro_de_carte INT AUTO_INCREMENT,
   date_d_inscription DATE,
   Id_personne INT NOT NULL,
   PRIMARY KEY(Numéro_de_carte),
   UNIQUE(Id_personne),
   FOREIGN KEY(Id_personne) REFERENCES tbl_personne(Id)
);

CREATE TABLE tbl_auteur(
   Id_personne INT,
   PRIMARY KEY(Id_personne),
   FOREIGN KEY(Id_personne) REFERENCES tbl_personne(Id)
);

CREATE TABLE tbl_etage(
   Id_rayon INT,
   Id INT,
   libelle VARCHAR(50),
   PRIMARY KEY(Id_rayon, Id),
   FOREIGN KEY(Id_rayon) REFERENCES tbl_rayons(Id)
);

CREATE TABLE tbl_exemplaire(
   numéro INT AUTO_INCREMENT,
   état VARCHAR(50),
   annee_edition DATE,
   Id_rayon_etage INT NOT NULL,
   Id_etage INT NOT NULL,
   Id_editeur INT NOT NULL,
   PRIMARY KEY(numéro),
   FOREIGN KEY(Id_rayon_etage, Id_etage) REFERENCES tbl_etage(Id_rayon, Id),
   FOREIGN KEY(Id_editeur) REFERENCES tbl_editeur(Id)
);

CREATE TABLE rediger(
   id_l_livre INT,
   Id_personne_auteur INT,
   PRIMARY KEY(id_l_livre, Id_personne_auteur),
   FOREIGN KEY(id_l_livre) REFERENCES tbl_livre(id_l),
   FOREIGN KEY(Id_personne_auteur) REFERENCES tbl_auteur(Id_personne)
);

CREATE TABLE appartenir(
   id_l INT,
   Id INT,
   PRIMARY KEY(id_l, Id),
   FOREIGN KEY(id_l) REFERENCES tbl_livre(id_l),
   FOREIGN KEY(Id) REFERENCES tbl_genre(Id)
);

CREATE TABLE Correspondre(
   id_l_Livre INT,
   numéro_Exemplaire INT,
   PRIMARY KEY(id_l_Livre, numéro_Exemplaire),
   FOREIGN KEY(id_l_Livre) REFERENCES tbl_livre(id_l),
   FOREIGN KEY(numéro_Exemplaire) REFERENCES tbl_exemplaire(numéro)
);

CREATE TABLE emprunter(
   numéro_exemplaire INT,
   Numéro_de_carte_inscrit INT,
   date_de_l_emprunt DATE,
   duree_de_lemprunt VARCHAR(50),
   PRIMARY KEY(numéro_exemplaire, Numéro_de_carte_inscrit),
   FOREIGN KEY(numéro_exemplaire) REFERENCES tbl_exemplaire(numéro),
   FOREIGN KEY(Numéro_de_carte_inscrit) REFERENCES tbl_inscrit(Numéro_de_carte)
);

CREATE TABLE marie(
   Id_epoux INT,
   Id_epouse INT,
   date_mariage DATE,
   date_divorce DATE,
   PRIMARY KEY(Id_epoux, Id_epouse),
   FOREIGN KEY(Id_epoux) REFERENCES tbl_personne(Id),
   FOREIGN KEY(Id_epouse) REFERENCES tbl_personne(Id)
);

CREATE TABLE rencontrer(
   Id_date INT,
   Id_personne_auteur INT,
   PRIMARY KEY(Id_date, Id_personne_auteur),
   FOREIGN KEY(Id_date) REFERENCES tbl_rencontre(Id),
   FOREIGN KEY(Id_personne_auteur) REFERENCES tbl_auteur(Id_personne)
);

CREATE TABLE habiter(
   Id_personne INT,
   Id_ville INT,
   PRIMARY KEY(Id_personne, Id_ville),
   FOREIGN KEY(Id_personne) REFERENCES tbl_personne(Id),
   FOREIGN KEY(Id_ville) REFERENCES tbl_ville(Id)
);
