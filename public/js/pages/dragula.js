var drake = dragula(
  [
    document.querySelector("#start"),
    document.querySelector("#dropBD"),
    document.querySelector("#dropBRSD"),
  ],
  {
    removeOnSpill: false,
  }
);
drake.on("drag", function (el) {
  // console.log('drag')
  // el.className.replace("ex-moved", "");
});
drake.on("drop", function (el, container) {
  if (container.id == "start") {
    el.classList.remove("btn-success", "btn-danger");
    el.classList.add("btn-light");
  } else if (
    (container.id == "dropBD" && el.classList.contains("1")) ||
    (container.id == "dropBRSD" && el.classList.contains("2"))
  ) {
    el.classList.remove("btn-light", "btn-danger");
    el.classList.add("btn-success");
  } else {
    el.classList.remove("btn-light", "btn-success");
    el.classList.add("btn-danger");
  }
});
