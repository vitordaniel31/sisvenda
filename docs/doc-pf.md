# Contagem de Pontos de Função
A contagem em **Pontos de Função (PF)** permite a determinação do **Tamanho Funcional** do projeto de software.
A análise de ponto de função (APF) é um processo para a identificação e contagem das funcionalidades baseadas nos conceitos 
de **Funções de Dados** e **Funções de Transação**. 

Os conceitos relacionados com dados são os **Arquivos de Lógica Interna (ALI)** e os **Arquivos de Interface Externa (AIE)**, 
e os conceitos relacionados com operações externas a fronteira do sistema são: 
**Entrada Externa (EE)**, **Consulta Externa (CE)** e **Saída Externa (SE)**.

## Siglas
* PF - Pontos de Função
* APF - Análise de Pontos de Função
* ALI - Arquivos Lógicos Internos

## Lista de User Stories
Lista de User Stories e os requisitos que estão associados.
* User Story US00 - Manter Usuários
    ``` 
    RF003 - Lista de Usuários
    RF004 - Cadastro de Usuário
    RF005 - Edição de Usuário
    RF006 - Excluir Usuário
* User Story US01 - Login
    ```
    RF001 - Login
* User Story US02 - Logout
    ```
    RF002 - Logout
* User Story US03 - Manter Produtos
    ```
    RF007 - Lista de Produtos
    RF008 - Cadastro de Produtos
    RF009 - Edição de Produto
    RF010 - Excluir Produto
* User Story US04 - Manter Vendas
    ```
    RF011 - Lista de Vendas
    RF012 - Cadastro de Vendas
    RF013 - Cancelar Vendas
    RF014 - Cadastrar produtos na venda
    RF015 - Remover produtos da venda
* User Story US05 - Manter Pagamento
    ```
    RF016 - Gerar Conta a Receber para Pagamento
    RF017 - Gerador de QR Code para PIX
* User Story US06 - Manter Formas de Pagamento
    ```
    RF018 - Lista de Formas de Pagamento
    RF019 - Cadastro de Formas de Pagamento
    RF020 - Edição de Forma de Pagamento
    RF021 - Excluir Forma de Pagamento
* User Story US07 - Manter Relatórios
    ```
    RF022 - Relatórios Periódicos
    RF023 - Estatísticas no Dashboard
    RF024 - Histórico de Ações
    RF025 - Lista de Histórico de Ações

## Contagem Indicativa

Na contagem indicativa (Ci) só é necessário conhecer e analisar as **Funções de Dados**. Desta forma, 
os **ALI**s (Arquivos Lógicos Internos) com o valor de *35 PF* cada e os **AIE**s (Arquivos de Interface Externa) com o valor de *15 PF* cada.

### Contagem Indicativa

| Função de Dado  | Entidades Relacionadas | Tamanho em PF |
| --------------- | ---------------------- | :-----------: |
| ALI Usuário     | Usuario                | 35 PF         |
| ALI Produto     | Produto                | 35 PF         |
| ALI Venda       | Venda                  | 35 PF         |
| AIE Conta       | Venda                  | 15 PF         |
| ALI Forma Pagamento | Endereço           | 35 PF         |
| ALI Relatório   | Endereço               | 35 PF         |
| **Total**       | **Ci**                 | **190 PF**    |

### Contagem Estimativa (Ce)

|     Descrição      |   Tipo   |   Complexidade      |   Tamanho em PF   |
| ------------------ | -------- | ----------------    | :---------------: |
|  ALI Usuário       |   ALI    |       Baixa         | 7 PF              |
|  ALI Produto       |   ALI    |       Baixa         | 7 PF              |
|  ALI Venda         |   ALI    |       Baixa         | 7 PF              |
|  AIE Conta         |   AIE    |       Baixa         | 5 PF              |
|  ALI Forma Pagamento | AIE    |       Baixa         | 7 PF              |
|  ALI Relatório     |   ALI    |       Baixa         | 7 PF              |
|  **Descrição**     | **Tipo** | **Complexidade** | **Tamanho em PF** |
|  Lista de Usuários    |    CE    |      Média         | 4 PF              |
|  Cadastro de Usuário  |    EE    |      Média         | 4 PF              |
|  Edição de Usuário    |    EE    |      Média         | 4 PF              |
|  Excluir Usuário      |    EE    |      Média         | 4 PF              |
|  Lista de Produtos    |    CE    |      Média         | 4 PF              |
|  Cadastro de Produtos |    EE    |      Média         | 4 PF              |
|  Edição de Produto    |    EE    |      Média         | 4 PF              |
|  Excluir Produto      |    EE    |      Média         | 4 PF              |
|  Lista de Vendas      |    CE    |      Média         | 4 PF              |
|  Cadastro de Vendas   |    EE    |      Média         | 4 PF              |
|  Cancelar Vendas      |    EE    |      Média         | 4 PF              |
|  Cadastrar produtos na venda |    EE    |    Média    | 4 PF              |
|  Remover produtos da venda   |    EE    |    Média    | 4 PF              |
|  Gerador de QR Code para PIX |    SE    |    Média    | 5 PF              |
|  Lista de Formas de Pagamento|    CE    |    Média    | 4 PF              |
|  Cadastro de Formas de Pagamento|  EE   |    Média    | 4 PF              |
|  Edição de Forma de Pagamento|    EE    |    Média    | 4 PF              |
|  Excluir Forma de Pagamento  |    EE    |    Média    | 4 PF              |
|  Relatórios Periódicos       |    CE    |    Média    | 4 PF              |
|  Estatísticas no Dashboard   |    CE    |    Média    | 4 PF              |
|  Histórico de Ações          |    EE    |    Média    | 4 PF              |
|  Lista de Histórico de Ações |    CE    |    Média    | 4 PF              |
|   **Total**                  |          |    **Ce**   | **134 PF**        |


### Contagem Detalhada (Cd)

|     Descrição      |   Tipo   |   RLR   |   DER   |   Complexidade   |   Tamanho em PF   |
| ------------------ | -------- | ------- | ---------- | ---------------- | :---------------: |
|  ALI Usuário       |   ALI    |    1    |    3    |       Baixa      | 7 PF              |
|  ALI Produto       |   ALI    |    1    |    3    |       Baixa      | 7 PF              |
|  ALI Venda         |   ALI    |    1    |    2    |       Baixa      | 7 PF              |
|  AIE Conta         |   AIE    |    1    |    2    |       Baixa      | 5 PF              |
|  ALI Forma Pagamento | AIE    |    1    |    2    |       Baixa      | 7 PF              |
|  ALI Relatório     |   ALI    |    1    |    4    |       Baixa      | 7 PF              |
|  **Descrição**        | **Tipo** | **ALR** | **DER**  | **Complexidade**  | **Tamanho em PF** |
|  Lista de Usuários    |    CE    |    1    |    3    |      Média         | 2 PF              |
|  Cadastro de Usuário  |    EE    |    1    |    3    |      Média         | 3 PF              |
|  Edição de Usuário    |    EE    |    1    |    3    |      Média         | 3 PF              |
|  Excluir Usuário      |    EE    |    1    |    3    |      Média         | 3 PF              |
|  Lista de Produtos    |    CE    |    1    |    3    |      Média         | 2 PF              |
|  Cadastro de Produtos |    EE    |    1    |    3    |      Média         | 3 PF              |
|  Edição de Produto    |    EE    |    1    |    3    |      Média         | 3 PF              |
|  Excluir Produto      |    EE    |    1    |    3    |      Média         | 3 PF              |
|  Lista de Vendas      |    CE    |    2    |    2    |      Média         | 2 PF              |
|  Cadastro de Vendas   |    EE    |    2    |    2    |      Média         | 3 PF              |
|  Cancelar Vendas      |    EE    |    2    |    2    |      Média         | 3 PF              |
|  Cadastrar produtos na venda |    EE    |    2    |    5 (3 + 2)    |    Média    | 3 PF              |
|  Remover produtos da venda   |    EE    |    2    |    5 (3 + 2)    |    Média    | 3 PF              |
|  Gerador de QR Code para PIX |    SE    |    1    |    2            |    Média    | 4 PF              |
|  Lista de Formas de Pagamento|    CE    |    2    |    3 (2 + 1)    |    Média    | 2 PF              |
|  Cadastro de Formas de Pagamento|  EE   |    1    |    3 (2 + 1)    |    Média    | 3 PF              |
|  Edição de Forma de Pagamento|    EE    |    1    |    3 (2 + 1)    |    Média    | 3 PF              |
|  Excluir Forma de Pagamento  |    EE    |    1    |    3 (2 + 1)    |    Média    | 3 PF              |
|  Relatórios Periódicos       |    CE    |    2    |    4    |    Média    | 2 PF              |
|  Estatísticas no Dashboard   |    CE    |    2    |    4    |    Média    | 2 PF              |
|  Histórico de Ações          |    EE    |    2    |    4    |    Média    | 3 PF              |
|  Lista de Histórico de Ações |    CE    |    2    |    4    |    Média    | 2 PF              |
|   **Total**                  |          |         |         |     **Cd**  | **100 PF**         |


