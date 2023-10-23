SISTEMA DE ROTAS INSERIDO MAS SISTEMA AINDA NÃO ADAPTADO


Kauã: Trabalhando na UI (Parte interativa) das páginas já adicionadas.



Yago: atualmente finalizando inserção de rotas para dar continuidade à página adSolo.php que consiste em exibir os anúncios individualmente, tanto para atualizar, quanto para excluir. 

--------------------------------------------------------------------------

A fazer:

crud anúncio - PAGINA adSolo.php
-read
-updtate
-delete


Bug:
-telefone($phone) as vezes cadastra e atualiza numero predefinido.
-usar DATE com formato Brasileiro


upload imagem de perfil
upload imagem de anuncio


-média do USER
-cometários de antigos contratantes no perfil visitado
-quantidade de serviços prestados e contratados

fazer pop-up de erro para query

inserir pesquisa de cep com resgate de loc

transformar "tipos" de anúncios em dropdown

resgatar data do anúncio

botao de alterar anuncio caso o user_id de quem acessa seja igual ao do dono do anuncio

--------------------------------------------------------------------------

Banco de dados: ooplogin

users:
-users_id INT 255 AUTO_INCREMENT
-user_email VARCHAR 255
-user_pwd VARCHAR 255
-user_first_name VARCHAR 255
-user_last_name VARCHAR 255
-user_phone INT 11
-user_signup_date DATETIME

ad:
-ad_id INT AUTO_INCREMENT
-ad_title VARCHAR 255
-ad_description TEXT
-ad_type VARCHAR 255
-users_id INT REFERENCES users(users_id)
-ad_date DATETIME

profiles:
-profiles_id INT AUTO_INCREMENT
-profiles_about TEXT
-profiles_introtitle TEXT
-profiles_introtext TEXT
users_id INT REFERENCES users(users_id)

pwdreset:
-pwdResetEmail TEXT
-pwdResetSelector TEXT
-pwdResetToken LONGTEXT
-pwdResetExpires TEXT
-pwdResetId INT AUTO_INCREMENT