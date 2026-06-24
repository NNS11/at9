# 📋 Sistema CRUD com Autenticação em PHP

Sistema completo de **Cadastro, Leitura, Atualização e Exclusão (CRUD)** desenvolvido em PHP com PDO e MySQL, com autenticação de usuários via sessão.

---

## 🚀 Tecnologias Utilizadas

- **PHP** — Lógica back-end e geração de páginas
- **MySQL** — Banco de dados relacional
- **PDO** — Conexão segura com o banco de dados
- **HTML5 / CSS3** — Interface do usuário
- **XAMPP** — Ambiente de desenvolvimento local

---

## 📁 Estrutura do Projeto

```
Projeto_crud/
├── bdcrud.sql              # Arquivo SQL para importar o banco
├── index.php               # Tela de login
├── registrar.php           # Cadastro de novos usuários
├── portal.php              # Painel principal com listagem
├── editar.php              # Edição de usuário existente
├── deletar.php             # Exclusão de usuário
├── logout.php              # Encerramento de sessão
├── classes/
│   ├── Database.php        # Classe de conexão com o banco (PDO)
│   └── Usuario.php         # Classe com todos os métodos CRUD
└── config/
    └── config.php          # Instancia a conexão com o banco
```

---

## ⚙️ Como Rodar o Projeto

### Pré-requisitos

- [XAMPP](https://www.apachefriends.org/) instalado
- Apache e MySQL rodando no painel do XAMPP

### Passo a passo

**1. Copie a pasta do projeto**

Coloque a pasta `Projeto_crud` dentro do diretório:
```
C:\xampp\htdocs\
```

**2. Importe o banco de dados**

- Abra o navegador e acesse: `http://localhost/phpmyadmin`
- Clique em **Importar**
- Selecione o arquivo `bdcrud.sql` que está na raiz do projeto
- Clique em **Executar**

> ⚡ **Alternativa:** o próprio sistema cria o banco e a tabela automaticamente na primeira vez que for acessado, caso o MySQL esteja rodando.

**3. Acesse o sistema**

Abra o navegador e acesse:
```
http://localhost/Projeto_crud/
```

---

## 🔐 Funcionalidades

| Funcionalidade | Descrição |
|---|---|
| ✅ Login | Autenticação com email e senha criptografada |
| ✅ Registro | Cadastro de novos usuários |
| ✅ Listagem | Visualização de todos os usuários cadastrados |
| ✅ Edição | Atualização dos dados de um usuário |
| ✅ Exclusão | Remoção de usuários com confirmação |
| ✅ Logout | Encerramento seguro da sessão |
| ✅ Saudação | Exibe "Bom dia / Boa tarde / Boa noite" conforme o horário |

---

## 🗄️ Estrutura do Banco de Dados

**Banco:** `bdcrud`

**Tabela:** `usuarios`

| Campo | Tipo | Descrição |
|---|---|---|
| id | INT AUTO_INCREMENT | Chave primária |
| nome | VARCHAR(255) | Nome completo |
| sexo | CHAR(1) | `M` = Masculino / `F` = Feminino |
| fone | VARCHAR(15) | Telefone |
| email | VARCHAR(100) UNIQUE | Email (único) |
| senha | VARCHAR(255) | Senha criptografada com bcrypt |

---

## 🔒 Segurança

- Senhas armazenadas com **hash bcrypt** via `password_hash()`
- Verificação de sessão em todas as páginas protegidas
- Queries parametrizadas com **PDO** para evitar SQL Injection
- Dados exibidos com `htmlspecialchars()` para evitar XSS

---

## 👨‍💻 Autor

Desenvolvido por **Nicolas Nunes Schweigardt**
Curso Técnico em TI — Ulbra São Lucas
