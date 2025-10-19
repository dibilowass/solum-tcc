const mensagens = [
  "Cada compra sustentável faz o planeta sorrir!",
  "Pequenas escolhas, grandes mudanças.",
  "Energia limpa começa em você!",
  "Cuide da Terra, ela cuida de você.",
  "Pequenas ações, grandes revoluções.",
  "A energia do sol move o amanhã.",
  "Cada gota conta para o futuro.",
  "O futuro é feito de escolhas conscientes.",
  "Cuidar do planeta é cuidar da vida.",
  "Azul como os oceanos, laranja como a esperança.",
  "Respire inovação, exale sustentabilidade.",
  "A mudança começa dentro de você.",
  "Ser verde é ser inteligente.",
  "Tecnologia e natureza podem caminhar juntas.",
  "Recarregue o mundo com boas atitudes.",
  "Um novo amanhecer começa com escolhas limpas.",
  "O rumo certo é o sustentável.",
  "Quando o planeta brilha, todos prosperam.",
  "Preserve hoje o que você vai sentir falta amanhã.",
  "A paixão laranja pela vida azul da Terra.",
  "Plantar ideias, colher futuro.",
  "O mundo gira, mas nossas atitudes ficam.",
  "Mude o planeta com um clique.",
  "Juntos, somos a força azul-laranja da transformação."
];

const mensagemEl = document.getElementById("mensagem");
let index = 0;

mensagemEl.addEventListener("mouseover", () => {
  index = (index + 1) % mensagens.length;
  mensagemEl.textContent = mensagens[index];
});

// Folhas animadas ao clicar no botão
document.getElementById("explorarBtn").addEventListener("click", () => {
  for (let i = 0; i < 12; i++) {
    const folha = document.createElement("div");
    folha.classList.add("folha");
    const size = 20 + Math.random() * 40;
    folha.style.width = `${size}px`;
    folha.style.height = `${size}px`;
    folha.style.left = Math.random() * 100 + "%";
    folha.style.animationDuration = 4 + Math.random() * 3 + "s";
    folha.style.animationDelay = Math.random() * 1 + "s";
    folha.style.opacity = Math.random() * 0.8 + 0.2;
    document.getElementById("folhas").appendChild(folha);
    setTimeout(() => folha.remove(), 7000);
  }
});

// Contador animado
let contador = 12000;
setInterval(() => {
  contador += Math.floor(Math.random() * 3);
  document.getElementById("contador").textContent = contador.toLocaleString();
}, 2000);