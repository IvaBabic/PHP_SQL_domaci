$("#dodajDoktora").submit(function (event) {
    event.preventDefault();
    console.log("Pokrenuto dodavanje doktora");
  
    const $form = $(this);
    const serijalizacija = $form.serialize();
    console.log(serijalizacija);
  
    request = $.ajax({
      url: "controller/dodajDoktora.php",
      type: "post",
      data: serijalizacija,
    });
  
    request.done(function (response, textStatus, jqXHR) {
      if (response === "Success") {
        alert("Doktor je dodat");
        location.reload(true);
      } else {
        console.log("Doktor nije dodat" + response);
      }
    });
  
    request.fail(function (jqXHR, textStatus, error) {
      console.error("Desila se greska: " + textStatus, error);
    });
  });