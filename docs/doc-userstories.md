
# Documento Lista de User Stories

## Descrição

Este documento descreve os User Stories criados a partir da Lista de Requisitos no [Documento 001 - Documento de Visão](https://github.com/vitordaniel31/sisvenda/blob/main/docs/doc_visao.md). Este documento também pode ser adaptado para descrever Casos de Uso. Modelo de documento baseado nas características do processo easYProcess (YP).

## Histórico de revisões

| Data       | Versão  | Descrição                          | Autor                          |
| :--------- | :-----: | :--------------------------------: | :----------------------------- |
| 13/04/2023 | 1.0   | Documento inicial  | José Pereira |
| 13/04/2023 | 1.1   | Correções  | José Pereira |
| 02/05/2023 | 1.2   | Correções  | Ketlly Medeiros |
| 06/05/2023 | 2.0   | Reconstrução do documento  | Ketlly Azevedo |
| 07/05/2023 | 2.1   | Correções  | Vitor Daniel |

### User Story US00 - Manter Usuários

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse story descreve as etapas para a criação, listagem, edição e exclusão de dados de um usuário, quando requisitado pelo administrador. Sendo que, o administrador será cadastrado diretamente pelos desenvolvedores sendo este impossível de excluir. O administrador, por sua vez, poderá cadastrar novos usuários, que irão receber o perfil de gerente e algumas permissões a menos que o administrador. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF003, RF004, RF005, RF006  | Manter gerentes     |

|                           |                                     |
| ------------------------- | ----------------------------------- |
| **Prioridade**            | Importante                           |
| **Estimativa**            | 10h                                |
| **Tempo Gasto (real):**   |                                     |
| **Tamanho Funcional**     | 20                                  |
| **Analista**             | Vitor (responsável por especificar/detalhar o US).                              |
| **Desenvolvedor**         |  José Pereira e Ketlly (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                  |
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          |
| **Testador**              |  Vitor (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         |

| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA00.01** | Após fornecer os dados necessários, o administrador poderá cadastrar novos gerentes, assim que a operação for concluída o sistema registra essa ação no histórico de ações. |
| **TA00.02** | Caso o administrador digite algum dado incorretamente, o sistema o informará do erro para que digite corretamente. Assim que a operação for concluída e o administrador devidamente cadastrado, o sistema registra no histórico de ações a conclusão do cadastro. |
| **TA00.03** | Para que seja feita a exclusão de um gerente, o administrador (único que pode realizar essa operação) busca pelo gerente a ser excluído, clica no botão de excluir e precisará confirmar que deseja excluí-lo. Após terminada a operação, é registrado no histórico de ações que este gerente foi excluído e seu autor. |
| **TA00.04** | Caso o gerente não seja localizado, será exibida uma mensagem pedindo para conferir se os dados estão corretos e em seguida repetir a ação. No caso de estarem certos, verificar se o gerente foi cadastrado no sistema anteriormente. |
| **TA00.05** | Caso o administrador feche o sistema antes de confirmar a exclusão do gerente selecionado, o sistema considerará que a exclusão não foi realizada. |
| **TA00.06** | Após acessar a página de seu perfil, o administrador poderá realizar a edição dos dados necessários, fornecendo os novos valores e os salvando. Assim que a operação for concluída o sistema registra essa ação no histórico de ações. |
| **TA00.07** | Para que o administrador faça a edição de um gerente, ele irá buscar pelo usuário que deseja, acessar seu perfil e então clicar no botão de edição de dados, finalmente poderá realizar a edição dos dados necessários, fornecendo os novos valores e os salvando. Assim que a operação for concluída o sistema registra essa ação no histórico de ações.|

### User Story US01 - Login

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | O sistema terá uma tela de login para o usuário entrar e realizar operações. O login será feito com email e senha. E terá a possibilidade de recuperar a senha. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF001  | Login     |

|                           |                                     |
| ------------------------- | ----------------------------------- |
| **Prioridade**            | Essencial                           |
| **Estimativa**            | 2h                                |
| **Tempo Gasto (real):**   |                                     |
| **Tamanho Funcional**     | 5                                    |
| **Analista**             | Vitor (responsável por especificar/detalhar o US).                              |
| **Desenvolvedor**         |  José Pereira e Ketlly (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente.)                                   |
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração)                                   |
| **Testador**              |  Vitor  (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                                   |

| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA01.01** | O usuário informa, na tela de login, email e senha, que ao clicar em Login ele é redirecionado para a página de acesso e o sistema registra essa ação no histórico de ações. |
| **TA01.02** | O usuário informa, na tela de login, email e senha incorretos, ao clicar em Login será retornada uma mensagem alertando que a senha está incorreta, ele poderá digitar novamente ou utilizar a opção Esqueci a Senha, para modificar sua senha e tentar login novamente. |
| **TA01.03** | O sistema informará ao usuário caso tente realizar login com algum campo em branco, o alerta será no campo que estiver em branco. Mensagem: Campo necessário não informado. |

### User Story US02 - Logout

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | O sistema terá um botão para quando o usuário quiser encerrar sua sessão. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF002      | Logout     |

|                           |                                     |
| ------------------------- | ----------------------------------- |
| **Prioridade**            | Importante                           |
| **Estimativa**            | 1h                                |
| **Tempo Gasto (real):**   |                                     |
| **Tamanho Funcional**     | 5                                    |
| **Analista**             | Vitor (responsável por especificar/detalhar o US).                              |
| **Desenvolvedor**         |  José Pereira (responsável por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                   |
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                                   |
| **Testador**              | Vitor  (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                                 |

| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA02.01** | Após clicar no botão "sair/logout"o sistema deve ir para a página inicial de login. O sistema registra essa ação no histórico de ações. |
| **TA02.02** | Caso o usuário feche o navegador ao invés de realizar o logout, o sistema manterá seu login efetuado. |

### User Story US03 - Manter Produtos

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse story descreve as etapas para a criação, listagem, edição ou exclusão dos produto. Para que a ação de cadastro ou edição seja efetuada, o administrador ou o gerente precisará fornecer código, nome, descrição e preço. Vale ressaltar, que o produto poderá ser inativado, caso não estiver mais a venda na loja, por exemplo.|

| **Requisitos envolvidos** |                                                   |
| -------------     | :------------------------------------------------------------- |
| RF007, RF008, RF009, RF010      |  Produtos

|                           |                                     |
| ------------------------- | ----------------------------------- |
| **Prioridade**            | Importante                           |
| **Estimativa**            | 10h                                |
| **Tempo Gasto (real):**   |                                     |
| **Tamanho Funcional**     | 20                                  |
| **Analista**             | Vitor (responsável por especificar/detalhar o US).                              |
| **Desenvolvedor**         |  José Pereira e Ketlly (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente).                                  |
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          |
| **Testador**              |  José  (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         |

| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA03.01** | Após fornecer os dados necessários, o usuário poderá cadastrar novos produtos, assim que a operação for concluída o sistema registra essa ação no histórico de ações. |
| **TA03.02** | Caso o usuário digite algum dado incorretamente, o sistema o informará do erro para que digite corretamente. Ou quando o produto já estiver cadastrado, o sistema informará que aquele produto já existe no banco de dados. Assim que a operação for concluída e o produto devidamente cadastrado, o sistema registra no histórico de ações a conclusão do cadastro.|
| **TA03.03** | Para que seja feita a edição de um produto, o usuário busca pelo produto desejado, clica no botão de editar e precisará fornecer os dados a serem atualizados, como também poderá editar o status para ativo/inativo, quando o produto estiver disponível ou quando não for mais vendido. Após confirmar a edição, é registrado no histórico de ações a edição do produto.|
| **TA03.04** | Caso o produto não seja localizado, será exibida uma mensagem pedindo para conferir se os dados estão certos e repetir a ação. E no caso de estarem certos, verificar se o produto já foi cadastrado.|
| **TA03.05** | Caso o usuário feche o sistema antes de confirmar a edição do produto selecionado, o sistema considerará que a edição não foi realizada. |

### User Story US04 - Manter Vendas

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse story descreve as etapas para cadastrar, listar, cancelar ou editar vendas. O administrador ou gerente precisará fornecer as informações relacionadas a venda. Para cancelar, apenas será necessário realizar a busca e confirmar o cancelamento.

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF011, RF012, RF013, RF014, RF015  |    Vendas

|                           |                                     |
| ------------------------- | ----------------------------------- |
| **Prioridade**            | Importante                           |
| **Estimativa**            | 12h                                |
| **Tempo Gasto (real):**   |                                     |
| **Tamanho Funcional**     | 20                                  |
| **Analista**             | Vitor (responsável por especificar/detalhar o US).                              |
| **Desenvolvedor**         |  José Pereira, Ketlly e Hugo  (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                  |
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          |
| **Testador**              |  Vitor (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         |

| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA04.01** | Após fornecer os dados necessários, o usuário poderá cadastrar uma nova venda. Assim que a operação for concluída, será gerado a forma de pagamento pelo método escolhido e o sistema registra essa venda no histórico de ações. |
| **TA04.02** | Caso o usuário digite algum dado incorretamente, o sistema o informará do erro para que digite corretamente. Ou quando o produto não estiver cadastrado, o sistema informará que aquele produto não existe no banco de dados e assim terá de ser feito o cadastro antes de realizar a venda. Assim que a operação for concluída e o produto devidamente cadastrado, o sistema registra no histórico de ações a conclusão do cadastro.|
| **TA04.03** | Caso no ato do pagamento ocorrer algum erro, a venda ficará como pendente até que o problema seja solucionado e o pagamento confirmado.|
| **TA04.04** | Para que seja feito o cancelamento de uma venda, o usuário busca pela venda em questão, clica no botão de cancelar e então precisará confirmar o cancelamento. Após terminada a operação, é registrado no histórico de ações que a venda foi cancelada e seu autor.|
| **TA04.05** | Caso a venda não seja localizada, será exibida uma mensagem pedindo para conferir se os dados estão certos e repetir a ação. E no caso de estarem certos, verificar se a venda foi iniciada. |
| **TA04.06** | Caso o usuário feche o sistema antes de confirmar o cancelamento da venda selecionada, o sistema considerará que a operação não foi realizada. |

### User Story US05 - Manter Pagamento

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse story descreve passo passo o pagamento, após selecionar a forma de pagamento de uma venda. Quando o usuário finalizar uma venda e escolher a forma de pagamento, irá gerar uma conta a receber, para que o cliente realize o pagamento, seja com uma ou mais formas, e assim, confirme o sucesso daquela venda. Cada um pagamento poderá ser feito com uma forma de pagamento. Assim, o cliente pode realizar vários pagamentos, com várias formas de pagamentos diferentes, até que a soma desses pagamentos resultem no valor total do pedido. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF016, RF017    |  Pagamento

|                           |                                     |
| ------------------------- | ----------------------------------- |
| **Prioridade**            | Importante                           |
| **Estimativa**            | 4h                                |
| **Tempo Gasto (real):**   |                                     |
| **Tamanho Funcional**     | 5                                  |
| **Analista**             | Vitor (responsável por especificar/detalhar o US).                              |
| **Desenvolvedor**         |  José Pereira, Ketlly e Hugo  (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                  |
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          |
| **Testador**              |  José (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         |

| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA05.01** | O sistema está gerando uma conta a receber  |
| **TA05.02** | Após o usuário finalizar o pagamento, todos os dados serão adicionados no log junto com o agente. |
| **TA05.03** | Caso o usuário encerre o processo sem finalizar. O pagamento será cancelado e todos os dados serão adicionados no log junto com o agente. |

### User Story US06 - Manter Formas de Pagamento

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse story descreve passo passo a forma de pagamento, após a finalização de uma venda. Quando o usuário finalizar uma venda, irá gerar uma conta a receber, para que o cliente realize a selação da forma de pagamento, seja com uma ou mais formas, e assim, confirme o sucesso daquela venda. Cada conta a receber, terá um ou muitos registros de pagamento e um pagamento poderá ser feito com uma forma de pagamento. Assim, o cliente pode realizar vários pagamentos, com várias formas de pagamentos diferentes, até que a soma desses pagamentos resultem no valor total do pedido.   |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF018, RF019, RF020, RF021      |  Forma de pagamento

|                           |                                     |
| ------------------------- | ----------------------------------- |
| **Prioridade**            | Importante                           |
| **Estimativa**            | 4h                                |
| **Tempo Gasto (real):**   |                                     |
| **Tamanho Funcional**     | 5                                  |
| **Analista**             | Vitor (responsável por especificar/detalhar o US).                              |
| **Desenvolvedor**         |  José Pereira, Ketlly e Hugo (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                  |
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          |
| **Testador**              |  Ketlly (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         |

| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA06.01** | O sistema está gerando uma conta a receber e é possível fazer pagamentos com formas de pagamento diferentes. |
| **TA06.02** | Caso o usuário escolha uma opção inválida, irá aparecer uma mensagem de erro.|
| **TA06.03** | Após o usuário escolher por uma opção válida, será gerado o caminho correto para a finalização e conclusão do pagamento. |
| **TA06.04** | Caso o usuário escolha uma opção e precise por alterar, será exibido a opção de troca do método. |
| **TA06.05** | Caso o usuário encerre o processo sem finalizar. O pagamento será cancelado e todos os dados serão adicionados no log junto com o agente. |

### User Story US07 - Manter Relatórios

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Com a emissão dos relatórios, será possível observar a venda total de um determinado período, podendo ver os produtos que mais saíram e qual o meio de pagamento mais utilizado. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF022, RF023      |  Relatórios

|                           |                                     |
| ------------------------- | ----------------------------------- |
| **Prioridade**            | Importante                           |
| **Estimativa**            | 5h                                |
| **Tempo Gasto (real):**   |                                     |
| **Tamanho Funcional**     | 10                                  |
| **Analista**             | Vitor (responsável por especificar/detalhar o US).                              |
| **Desenvolvedor**         |  José Pereira, Ketlly e Hugo  (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                  |
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          |
| **Testador**              |  Vitor (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         |

| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA07.01** | Após o administrador acessar a página de emissão de relatórios, ele terá que informar um período para emissão dos relatórios e então o sistema carregará todas as informações desse determinado período. Tais como: valor total, peças mais vendidas e outros dados.|
| **TA07.02** | Caso ele tenha colocado uma data que não ocorreu vendas será retornado uma mensagem informado, ou caso ele coloque uma data inexistente (ex.: 30/02/2005) aparecerá uma mensagem de erro e ele digitará novamente, uma data correta.|

### User Story US08 - Manter Pix

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Esse story descreve a funcionalidade utilizada para cadastrar, editar e excluir informações relacionadas ao PIX. Para seu funcionamento, o administrador precisará fornecer a chave PIX, o banco da conta. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF026, RF027, RF028, RF029      |  Pix

|                           |                                     |
| ------------------------- | ----------------------------------- |
| **Prioridade**            | Importante                           |
| **Estimativa**            | 5h                                |
| **Tempo Gasto (real):**   |                                     |
| **Tamanho Funcional**     | 5                                  |
| **Analista**             | Vitor (responsável por especificar/detalhar o US).                              |
| **Desenvolvedor**         |  José Pereira, Ketlly e Hugo  (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                  |
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          |
| **Testador**              |  Vitor (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         |

| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA08.01** | Após o administrador acessar a página de cadastro do PIX e preencher os dados adequadamente, finaliza a operação e  o sistema exibe uma mensagem de operação bem sucedida. Assim que a operação for concluída, o sistema registra nos logs a conclusão do cadastro.|
| **TA08.02** | Caso o administrador não conclua a ação de cadastro o sistema o redireciona para a tela de PIX cadastrados. Caso seja digitado algum dado incorretamente, o sistema informará o erro para que seja corrigido. Assim que a operação for concluída e não houver erros, o sistema registra nos logs a conclusão do cadastro.|
| **TA08.03** | Após o administrador acessar a página de PIX cadastrados e selecionar a que for editar, o administrador fornece as novas informações relacionadas àquela chave e finaliza a operação, com o sistema exibindo uma mensagem de operação bem sucedida. Assim que a operação for concluída, o sistema registra nos logs a conclusão da edição.|
| **TA08.04** | Caso o administrador não conclua a edição, o sistema o redireciona para a tela de PIX cadastrados. Caso seja digitado algum dado incorretamente, o sistema informará o erro para que seja corrigido. Assim que a operação for concluída e não houver erros, o sistema registra nos logs a conclusão de edição.|
| **TA08.05** | Após o administrador acessar a página de PIX cadastrados e selecionar a que for desativar, ele terá que confirmar a desativação daquela chave e finalizar a operação, com o sistema exibindo uma mensagem de operação bem sucedida. Assim que a operação for concluída, o sistema registra nos logs a desativação da chave PIX.|
| **TA08.06** | Caso o administrador não confirme a desativação, o sistema o redireciona para a tela de PIX cadastrados. Assim que a operação for concluída e não houver erros, o sistema registra nos logs a conclusão de desativação.|

### User Story US09 - Registro de Atividades

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Para segurança do sistema, haverá uma tabela que registrará todas as
ações do sistema: login e logout dos usuários, alteração de dados e emissão de relatórios.
Salvando sempre o antes e o depois da alteração.
. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF024, RF025   |  Histórico de Ações

|                           |                                     |
| ------------------------- | ----------------------------------- |
| **Prioridade**            | Importante                           |
| **Estimativa**            | 4h                                |
| **Tempo Gasto (real):**   |                                     |
| **Tamanho Funcional**     | 5                                  |
| **Analista**             | Vitor (responsável por especificar/detalhar o US).                              |
| **Desenvolvedor**         |  José Pereira, Ketlly e Hugo  (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                  |
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          |
| **Testador**              |  José (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         |

| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA09.01** | O sistema registrará cada movimentação feita no projeto |
| **TA09.02** | Caso o usuário encerre o processo sem finalizar. O pagamento será cancelado e todos os dados serão adicionados no log junto com o agente. |

### User Story US10 - Manter Itens da Compra

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Para ser possível adicionar varios itens ao pedido, a venda, é necessário ter os itens da venda, no qual o mesmo pode ser adiconado, substituido ou até mesmo deletado de uma venda .
. |

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF030, RF031, RF032 , RF033    |  Itens da Compra

|                           |                                     |
| ------------------------- | ----------------------------------- |
| **Prioridade**            | Importante                           |
| **Estimativa**            | 4h                                |
| **Tempo Gasto (real):**   |                                     |
| **Tamanho Funcional**     | 5                                  |
| **Analista**             | Vitor (responsável por especificar/detalhar o US).                              |
| **Desenvolvedor**         |  José Pereira, Ketlly e Hugo  (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                  |
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          |
| **Testador**              |  José (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         |

| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA10.01** | O usuário adicionará os produtos que estarão na venda, junto a sua quantidade.|
| **TA10.02** | Caso tenha colocado produtos em quantidades superiores ao pedido, é possível modificar.|
| **TA10.03** | Se um produto for adicionado a mais, ou o cliente venha a desistir de algum dos produtos, é possível remover o produto da venda.|

### User Story US11 - Gerar QRcode do Pix

|               |                                                                |
| ------------- | :------------------------------------------------------------- |
| **Descrição** | Gerar QRcode para finalização da venda, onde o cliente paga com o valor total e após recebimento do pix ser confirmado a venda é finalizada.

| **Requisitos envolvidos** |                                                    |
| -------------     | :------------------------------------------------------------- |
| RF017    |  QRcode

|                           |                                     |
| ------------------------- | ----------------------------------- |
| **Prioridade**            | Importante                           |
| **Estimativa**            | 5h                                |
| **Tempo Gasto (real):**   |                                     |
| **Tamanho Funcional**     | 5                                  |
| **Analista**             | Vitor (responsável por especificar/detalhar o US).                              |
| **Desenvolvedor**         |  José Pereira, Ketlly e Hugo  (responsáveis por implementar e realizar testes de unidade e testes de integração).
| **Gerente**         |  Ketlly (responsável por acompanhar o desenvolvimento da atividade e observar se o resultado final segue o pedido do cliente)                                  |
| **Revisor**               |  Vitor (responsável por avaliar a implementação e executar os testes de unidade e testes de integração).                          |
| **Testador**              |  José (responsável por executar os Testes de Aceitação e fazer  relatório de testes).                         |

| Testes de Aceitação (TA) |  |
| ------------------ | --------- |
| **Código**      | **Descrição** |
| **TA11.11** | Após o administrador cadastrar uma venda, conforme o requisitado, e escolher o PIX como forma de pagamento, o sistema gera o QR Code para pagamento com PIX e então verifica se o pagamento foi realizado com sucesso.|
| **TA11.12** | Caso não haja uma venda correspondente àquele pagamento, o usuário será informado de tal erro e será preciso verificar se a venda foi realmente cadastrada. Assim que a operação for concluída e não houver erros, o sistema registra nos logs a conclusão do pagamento.|
| **TA11.13** | Caso no ato do pagamento ocorrer algum erro, a venda ficará como pendente até que seja normalizado. Assim que a operação for concluída e não houver erros, o sistema registra nos logs a conclusão do pagamento.|
