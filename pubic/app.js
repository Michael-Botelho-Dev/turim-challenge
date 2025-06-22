let dados = { pessoas: [] };

function atualizar() {
    const tabela = document.getElementById("tabela");
    tabela.innerHTML = "";

    dados.pessoas.forEach((pessoa, index) => {
        const linha = document.createElement("tr");
        const coluna = document.createElement("td");

        const div = document.createElement("div");
        div.textContent = pessoa.nome;
        div.style.marginBottom = "5px";

        const btnFilho = document.createElement("button");
        btnFilho.textContent = "Adicionar filho";
        btnFilho.onclick = () => adicionarFilho(index);

        const btnRemover = document.createElement("button");
        btnRemover.textContent = "Remover";
        btnRemover.onclick = () => remover(index);

        coluna.appendChild(div);
        coluna.appendChild(btnFilho);
        coluna.appendChild(btnRemover);

        linha.appendChild(coluna);
        tabela.appendChild(linha);
    });

    document.getElementById("json").value = JSON.stringify(dados, null, 4);
}

function incluir() {
    const nome = document.getElementById("nome").value.trim();
    if (nome === "") {
        alert("Digite um nome.");
        return;
    }
    dados.pessoas.push({ nome, filhos: [] });
    document.getElementById("nome").value = "";
    atualizar();
}

function adicionarFilho(index) {
    const nomeFilho = prompt("Digite o nome do filho:");
    if (nomeFilho) {
        dados.pessoas[index].filhos.push(nomeFilho.trim());
        atualizar();
    }
}

function remover(index) {
    if (confirm("Deseja remover essa pessoa?")) {
        dados.pessoas.splice(index, 1);
        atualizar();
    }
}

function gravar() {
    fetch("gravar.php", {
        method: "POST",
        body: JSON.stringify(dados)
    })
    .then(res => res.json())
    .then(res => alert(res.status))
    .catch(() => alert("Erro ao gravar dados."));
}

function ler() {
    fetch("ler.php")
    .then(res => res.json())
    .then(res => {
        dados = res;
        atualizar();
    })
    .catch(() => alert("Erro ao ler dados."));
}