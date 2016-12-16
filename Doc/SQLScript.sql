/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  16/12/2016 16:15:40                      */
/*==============================================================*/


drop table if exists BENEFICIAIRE;

drop table if exists CAGNOTTE;

drop table if exists REGION;

drop table if exists TRANSACTION_ENTRANTE;

drop table if exists TRANSACTION_SORTANTE;

drop table if exists TYPECAGNOTTE;

drop table if exists TYPEUSER;

drop table if exists UTILISATEUR;

/*==============================================================*/
/* Table : BENEFICIAIRE                                         */
/*==============================================================*/
create table BENEFICIAIRE
(
   ID                   numeric not null,
   IDENTIFIANT          numeric,
   PRENOM               text,
   DATECREATION         datetime,
   DATEMODIFICATION     datetime,
   DATESUPPRESSION      datetime,
   IDREGION             numeric,
   primary key (ID)
);

/*==============================================================*/
/* Table : CAGNOTTE                                             */
/*==============================================================*/
create table CAGNOTTE
(
   ID                   numeric not null,
   VALEUR               numeric not null,
   IDREGION             numeric,
   IDTYPE               numeric,
   primary key (ID)
);

/*==============================================================*/
/* Table : REGION                                               */
/*==============================================================*/
create table REGION
(
   ID                   numeric not null,
   NOM                  numeric not null,
   primary key (ID)
);

/*==============================================================*/
/* Table : TRANSACTION_ENTRANTE                                 */
/*==============================================================*/
create table TRANSACTION_ENTRANTE
(
   ID                   numeric not null,
   MONTANT              float(0) not null,
   DATE                 datetime not null,
   IDCAGNOTTE           numeric,
   IDUSER               numeric,
   primary key (ID)
);

/*==============================================================*/
/* Table : TRANSACTION_SORTANTE                                 */
/*==============================================================*/
create table TRANSACTION_SORTANTE
(
   ID                   numeric not null,
   MONTANT              float(0),
   DATE                 datetime,
   IDCAGNOTTE           numeric,
   IDBENEFICIAIRE       numeric,
   IDPARTENAIRE         numeric,
   primary key (ID)
);

/*==============================================================*/
/* Table : TYPECAGNOTTE                                         */
/*==============================================================*/
create table TYPECAGNOTTE
(
   ID                   numeric not null,
   NOM                  numeric not null,
   primary key (ID)
);

/*==============================================================*/
/* Table : TYPEUSER                                             */
/*==============================================================*/
create table TYPEUSER
(
   ID                   numeric not null,
   NOM                  numeric not null,
   primary key (ID)
);

/*==============================================================*/
/* Table : UTILISATEUR                                          */
/*==============================================================*/
create table UTILISATEUR
(
   ID                   numeric not null,
   MAIL                 text,
   MDP                  text,
   ADRESSE              text,
   CP                   int,
   VILLE                text,
   DATECREATION         datetime,
   DATEMODIFICATION     datetime,
   DATESUPPRESSION      datetime,
   IDTYPE               numeric,
   IDREGION             numeric,
   primary key (ID)
);

alter table BENEFICIAIRE add constraint FK_REFERENCE_2 foreign key (IDREGION)
      references REGION (ID) on delete restrict on update restrict;

alter table CAGNOTTE add constraint FK_REFERENCE_4 foreign key (IDREGION)
      references REGION (ID) on delete restrict on update restrict;

alter table CAGNOTTE add constraint FK_REFERENCE_5 foreign key (IDTYPE)
      references TYPECAGNOTTE (ID) on delete restrict on update restrict;

alter table TRANSACTION_ENTRANTE add constraint FK_REFERENCE_7 foreign key (IDCAGNOTTE)
      references CAGNOTTE (ID) on delete restrict on update restrict;

alter table TRANSACTION_ENTRANTE add constraint FK_REFERENCE_8 foreign key (IDUSER)
      references UTILISATEUR (ID) on delete restrict on update restrict;

alter table TRANSACTION_SORTANTE add constraint FK_REFERENCE_3 foreign key (ID)
      references BENEFICIAIRE (ID) on delete restrict on update restrict;

alter table TRANSACTION_SORTANTE add constraint FK_REFERENCE_6 foreign key (IDCAGNOTTE)
      references CAGNOTTE (ID) on delete restrict on update restrict;

alter table UTILISATEUR add constraint FK_REFERENCE_10 foreign key (IDREGION)
      references REGION (ID) on delete restrict on update restrict;

alter table UTILISATEUR add constraint FK_REFERENCE_9 foreign key (IDTYPE)
      references TYPEUSER (ID) on delete restrict on update restrict;

