-- SIBD PROJECT: Irene Amaral, João Filipe.


PRAGMA foreign_keys = off;		--????????????????
BEGIN TRANSACTION;				--????????????????

-- Table: utilizadores
CREATE TABLE utilizadores (
	nUtilizador INTEGER PRIMARY KEY AUTOINCREMENT, 
	nome VARCHAR NOT NULL, 
	email VARCHAR NOT NULL UNIQUE
);
INSERT INTO utilizadores (nUtilizador, nome, email) VALUES (1, 'João', 'test@gmail.com');
INSERT INTO utilizadores (nUtilizador, nome, email) VALUES (2, 'Irene', 'newtest@gmail.com');


-- Table: condutores
CREATE TABLE condutores (
	idC INTEGER PRIMARY KEY REFERENCES utilizadores (nUtilizador), 
	nCartaCondução INTEGER NOT NULL UNIQUE
);
INSERT INTO condutores (idC, nCartaCondução) VALUES (1, 123456781);
INSERT INTO condutores (idC, nCartaCondução) VALUES (2, 123456782);


-- Table: carros
CREATE TABLE carros (
	idCarro INTEGER PRIMARY KEY AUTOINCREMENT, 
	matrícula VARCHAR NOT NULL UNIQUE, 
	marca VARCHAR NOT NULL, 
	modelo VARCHAR NOT NULL, 
	combustível VARCHAR 
		CONSTRAINT combustivel CHECK (combustível == "gasolina" or combustível == "gasoleo" or combustível == "eletrico" or combustível == "hibrido" or combustível == "gas"), 
	condutor INTEGER REFERENCES condutores (idC) NOT NULL
	);
INSERT INTO carros (idCarro, matrícula, marca, modelo, combustível, condutor) VALUES (1, '99-ZZ-99', 'Fiat', 'Uno', 'gasoleo', 1);
INSERT INTO carros (idCarro, matrícula, marca, modelo, combustível, condutor) VALUES (2, '98-ZZ-98', 'Tesla', 'S', 'eletrico', 2);


-- Table: passageiros
CREATE TABLE passageiros (
	idP INTEGER PRIMARY KEY REFERENCES utilizadores (nUtilizador)
);
INSERT INTO passageiros (idP) VALUES (1);
INSERT INTO passageiros (idP) VALUES (2);


-- Table: viagens
CREATE TABLE viagens (
	idV INTEGER PRIMARY KEY AUTOINCREMENT, 
	dataPartida DATETIME NOT NULL 
		CONSTRAINT horas CHECK (dataPartida < dataChegada OR dataChegada IS NULL), 
	dataChegada DATETIME 
		CONSTRAINT horas CHECK (dataPartida < dataChegada OR dataChegada IS NULL), 
	partida INTEGER REFERENCES locais (idcoord) NOT NULL 
		CONSTRAINT local_partida_chegada CHECK (partida <> chegada), 
	chegada INTEGER REFERENCES locais (idcoord) NOT NULL 
		CONSTRAINT local_partida_chegada CHECK (partida <> chegada)
);
INSERT INTO viagens (idV, DataPartida, DataChegada, partida, chegada) VALUES (1, '2019-12-08 20:00:00', '2019-12-08 21:00:00', 1, 2);
INSERT INTO viagens (idV, DataPartida, DataChegada, partida, chegada) VALUES (2, '2019-12-10 20:00:00', '2019-12-11 7:00:00', 1, 3);


-- Table: viagensP
CREATE TABLE viagensP (
	idVp INTEGER PRIMARY KEY REFERENCES viagens (idV), 
	passageiro INTEGER REFERENCES passageiros (idP) NOT NULL, 
	boleia_de INTEGER REFERENCES viagensC (idVc) NOT NULL, 
	classificação INTEGER (0, 5) 
		CONSTRAINT classificação CHECK (classificação > 0 AND classificação <= 5)
);
INSERT INTO viagensP (idVp, passageiro, boleia_de, classificação) VALUES (1, 2, 1, NULL);
INSERT INTO viagensP (idVp, passageiro, boleia_de, classificação) VALUES (2, 1, 2, NULL);


-- Table: viagensC
CREATE TABLE viagensC (
	idVc INTEGER REFERENCES viagens (idV) PRIMARY KEY, 
	condutor INTEGER REFERENCES condutores (idC) NOT NULL
);
INSERT INTO viagensC (idVc, condutor) VALUES (1, 2);
INSERT INTO viagensC (idVc, condutor) VALUES (2, 1);


-- Table: trajetos
CREATE TABLE trajetos (
	idT INTEGER PRIMARY KEY AUTOINCREMENT, 
	preço INTEGER CONSTRAINT preço CHECK (preço > 0), 
	partida TEXT NOT NULL REFERENCES locais (idCoord) 
		CONSTRAINT local_partida_chegada CHECK (partida <> chegada), 
	chegada TEXT REFERENCES locais (idCoord) NOT NULL 
		CONSTRAINT local_partida_chegada CHECK (partida <> chegada)
);


-- Table: ViagensTrajetosPassageiros
CREATE TABLE ViagensTrajetosPassageiros (
	idViagemVTP INTEGER PRIMARY KEY REFERENCES viagensC (idVc), 
	idTrajetoVTP INTEGER REFERENCES trajetos (idT), 
	idPassageiroVTP INTEGER REFERENCES passageiros (idP)
	PRIMARY KEY (idViagemVTP, idTrajetoVTP, idPassageiroVTP)
);


-- Table: NumeroPassageiros
CREATE TABLE NumeroPassageiros (
	viagem_C INTEGER PRIMARY KEY REFERENCES viagensC (idVc), 
	trajeto INTEGER REFERENCES trajetos (idT), 
	nPassageiros INTEGER (0, 4) 
		CONSTRAINT nPassageiros CHECK (nPassageiros <= 4)
	PRIMARY KEY (viagem_C, trajeto)
);


-- Table: locais
CREATE TABLE locais (
	idCoord INTEGER PRIMARY KEY, 
	coord_latitude TEXT NOT NULL, 
	coord_longitude TEXT NOT NULL
);
INSERT INTO locais (idCoord, coord_latitude, coord_longitude) VALUES (1, '1233', '1233');
INSERT INTO locais (idCoord, coord_latitude, coord_longitude) VALUES (2, '1234', '1234');
INSERT INTO locais (idCoord, coord_latitude, coord_longitude) VALUES (3, '2000', '2000');


COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
