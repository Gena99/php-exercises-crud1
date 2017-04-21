SELECT * FROM colyseum.clients;
-- selection ses clients ayant une carte
SELECT * FROM colyseum.clients WHERE card = 1;
-- selection de cartes fidelites
SELECT * FROM colyseum.cards WHERE cardTypesId = 1;

-- joindre les tables
SELECT * 
FROM colyseum.clients 
	JOIN colyseum.cards ON colyseum.clients.cardNumber = colyseum.cards.cardNumber 
WHERE cardTypesId = 1;


-- Exo 5 : Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".
SELECT lastName, firstName FROM colyseum.clients WHERE lastName LIKE'M%';

-- Exo 6
SELECT title,performer,date,startTime FROM colyseum.shows ORDER BY title;

-- exo  7
SELECT lastName, firstName, birthDate, IF(cardTypesId=1,'oui','non') as carteFidelite, cards.cardNumber
FROM colyseum.clients 
	LEFT JOIN colyseum.cards ON colyseum.clients.cardNumber = colyseum.cards.cardNumber AND cardTypesId=1
    -- WHERE cardTypesId = 1
;

