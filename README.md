Kauã: Trabalhando na UI (Parte interativa) das páginas já adicionadas.


Yago: Configurando as adaptações do chat para o nosso projeto.


--------------------------------------------------------------------------


A fazer:

Bugs:
-telefone($phone) as vezes cadastra e atualiza numero predefinido.
-usar DATE com formato Brasileiro
-textareas salvando com espaços em branco
-NAVBAR da página AdSolo está sem CSS

Melhoras:
-transformar $adId em uma constante na myadsinfo VIEW
-adicionar tratamento de erros nos controllers (_controller)
-inserir nome e telefone no anúncio
-senha (visualizar e pedir senha forte)

Banner da Home

Carrosel da Home 

upload imagem de perfil
upload imagens de anuncio

-média do USER
-cometários de antigos contratantes no perfil visitado
-quantidade de serviços prestados e contratados

input de pesquisa na NAVBAR

pesquisa de cep automatico / DROPDOWN ?
-estado
-cidade
-bairro

botão de favoritar
botão de compartilhar
botão denunciar

resgatar data do anúncio em formato BR

fazer pop-up de erro para query

chat

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
-ad_price INT
-ad_cep VARCHAR 255
-ad_state VARCHAR 255
-ad_city VARCHAR 255
-ad_district VARCHAR 255

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