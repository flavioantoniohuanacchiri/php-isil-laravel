$(".solo-enteros").numeric(false, 
  function() { 
    this.notify("Solo Enteros", "danger");this.value = ""; this.focus(); 
});
$(".decimales").numeric();