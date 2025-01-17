# VarzeaCup 🏆  
Sistema de Gerenciamento de Campeonatos Amadores e de Várzea  

## 📋 Descrição  
O **VarzeaCup** é uma plataforma dedicada à gestão de campeonatos amadores e de várzea. Com ele, você pode:  
- Criar usuários e futuramente gerenciar autenticações.  
- Cadastrar times, campeonatos e partidas (restrito a usuários autenticados).  
- Inserir e atualizar os placares das partidas.  
- Acompanhar a classificação dos campeonatos, com posição, pontos, partidas jogadas, vitórias, empates e derrotas.  

A classificação é calculada com base nas regras:  
- **Vitória**: 3 pontos  
- **Empate**: 1 ponto  
- **Derrota**: 0 pontos  

## 🛠️ Funcionalidades  
### 1. **Tela Inicial (Index)**  
- Login e criação de usuários.  
- Visualização da classificação do campeonato.  

### 2. **Cadastro de Usuários**  
- Formulário para criação de conta.  

### 3. **Cadastro Geral** *(somente para usuários autenticados)*  
- Cadastro de times, campeonatos e partidas.  

### 4. **Gerenciamento de Partidas**  
- Inserir e atualizar placares.  
- Visualizar times, campeonatos e usuários.  
- Deletar ou modificar registros existentes.  

## 🚀 Tecnologias Utilizadas  
- **Composer**: Versão 2.8.4  
- **PHP**: Versão 8.3  
- **Laravel**: Versão 11  
- **MySQL**  
- **Apache2**  

## ⚙️ Configuração do Ambiente  
### 1. Configurar a Conexão com o Banco de Dados  
Edite o arquivo `.env` com as informações do seu banco de dados:  
```env
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```  

### 2. Executar as Migrações  
Crie as tabelas no banco de dados:  
```bash
php artisan migrate
```  

### 3. Iniciar o Servidor Local  
Execute o comando para iniciar o sistema:  
```bash
php artisan serve
```  

Acesse o sistema em: [http://localhost:8000](http://localhost:8000)  

## 📊 Classificação do Campeonato  
A classificação é apresentada em uma tabela na tela inicial:  
```
Posição   | Time     | Pontos | Partidas Jogadas | Vitórias | Empates | Derrotas  
1         | Time X   | 9      | 3                | 3        | 0       | 0  
2         | Time Y   | 7      | 3                | 2        | 1       | 0  
```  

## 📂 Estrutura do Projeto  
- **Index**: Login, criação de usuários e visualização da classificação.  
- **Cadastro de Usuários**: Formulário para novos usuários.  
- **Cadastro Geral**: Gerenciamento de times, campeonatos e partidas (autenticado).  
- **Gerenciamento de Partidas**: Atualização de placares e gestão de registros.  

## 📝 Observações  
- Para acessar recursos protegidos, faça login no sistema.  
- Certifique-se de configurar o banco de dados corretamente antes de iniciar.  
 
