**Relatório de Testes de Módulo/Sistema**

Responsabilidade do Testador

**Legenda**

**Teste** : User Story US01 - Login.

**Descrição**:O usuário deverá preencher os campos com as informações
requisitadas, o email e a senha para poder, assim, ter acesso ao
sistema.

**Especificação**:O sistema terá uma tela de login para o usuário entrar
e realizar operações. O login será feito com email e senha. E terá a
possibilidade de recuperar a senha.

**Resultado**: Com as informações corretas o login funciona
corretamente, levando o usuário para a página principal, no entanto o
erro se dá quando o usuário tenta recuperar a senha, pois a configuração
do servidor de email ainda não está implementada, gerando essa exception

![](img/esqueceuSenha.png){width="6.267716535433071in"
height="3.0in"}

**US001 - Manter Produto**

| **Teste** | **Descrição** | **Especificação** | **Resultado** |
| :--------- | :--------------- | :-------------- | :--------------- |
| Teste 01: login | A1 -Login  <br>A1.1. O ator preenche os dados;  <br>A1.2. O ator seleciona o botão log in;  <br>A1.3. O sistema valida os dados;   <br>A1.4. O ator entra na página principal do sistema;<br>A1.5. Se as informações postas estiverem incorretas, o sistema envia uma mensagem de erro e permite o usuário preencher os dados novamente;<br>A1.6.Caso o usuário esqueça a senha e clique no botão de esqueceu a senha? o usuário é direcionado a página para enviar o email, porém apresenta erro ao enviar o email<br>A1.7. Fim do fluxo.
  | A função implementada não segue os passos A1.6.<br>A implementação não está de acordo com a especificação do User Story.

  | O produto login funcionou, porém não funciona a implementação do esqueceu a senha.  |

**Relatório de Bugs e Providências**

Responsabilidade do Gerente

 | **Teste**       |        **Providência**     |    **Tarefas/Tipo**|
 | :--------- | :--------------- | :--------------
 | Teste 01 - Login |    Configurar servidor de email. |  Tarefa: Bug de Implementação.
