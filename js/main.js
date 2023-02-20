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


  $("#Prikazisvedoktore").submit(function (event) {
    event.preventDefault();
    console.log("Pokrenut prikaz doktora");
  
    request = $.ajax({
      url: "controller/prikaziDoktore.php",
      type: "get",
    });
  
    request.done(function (response, textStatus, jqXHR) {
      if (response === "Success") {
        alert("Prikazani su doktori");
        location.reload(true);
      } else {
        console.log("Doktori nisu prikazani" + response);
      }
    });
  
    request.fail(function (jqXHR, textStatus, error) {
      console.error("Desila se greska: " + textStatus, error);
    });
  });

  
  $("#Prikazisvepacijente").submit(function (event) {
    event.preventDefault();
    console.log("Pokrenut prikaz pacijenata");
  
    request = $.ajax({
      url: "controller/prikaziPacijente.php",
      type: "get",
    });
  
    request.done(function (response, textStatus, jqXHR) {
      if (response === "Success") {
        alert("Prikazani su pacijenti");
        location.reload(true);
      } else {
        console.log("Pacijenti nisu prikazani" + response);
      }
    });
  
    request.fail(function (jqXHR, textStatus, error) {
      console.error("Desila se greska: " + textStatus, error);
    });
  });


  