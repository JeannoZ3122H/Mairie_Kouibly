<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    </head>
    <body>
        <h1 ><a href="{{ route('front') }}"  class="text-center text-success text-decoration-none">Commune de Fronan</a></h1>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


        <script src="https://cdn.cinetpay.com/seamless/main.js" type="text/javascript"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        
        <script>
            let montant_timbre = {{Js::from($montant_timbre)   }}
            let montant_livraison = {{Js::from($montant_livraison)}}
            let description = {{ Js::from($document) }}
            $(document).ready(function() {

                    let montant_timbres = montant_timbre
                    let montant_livraisons = montant_livraison
                    let descriptions = description;

                    let sommeToPay = parseInt(montant_timbre)+ parseInt(montant_livraison);
                    console.log(sommeToPay , description);

                    checkout(sommeToPay, description);

            


                
            })

            function checkout(montant_timbre, description) {
                CinetPay.setConfig({
                    apikey: '983356407574c21f3171d98.51492430',//   YOUR APIKEY
                    site_id: '142244',//YOUR_SITE_ID
                    notify_url: 'http://mondomaine.com/notify/',
                    mode: 'PRODUCTION'
                });
                CinetPay.getCheckout({
                    transaction_id: Math.floor(Math.random() * 100000000).toString(),
                    amount: montant_timbre,
                    currency: 'XOF',
                    channels: 'ALL',
                    description: description,   
                    //Fournir ces variables pour le paiements par carte bancaire
                    customer_name:"Joe",//Le nom du client
                    customer_surname:"Down",//Le prenom du client
                    customer_email: "down@test.com",//l'email du client
                    customer_phone_number: "088767611",//l'email du client
                    customer_address : "BP 0024",//addresse du client
                    customer_city: "Antananarivo",// La ville du client
                    customer_country : "CM",// le code ISO du pays
                    customer_state : "CM",// le code ISO l'état
                    customer_zip_code : "06510", // code postal

                });
                CinetPay.waitResponse(function(data) {
                    if (data.status == "REFUSED") {
                        if (alert("Votre paiement a échoué")) {
                            window.location.reload();
                        }
                    } else if (data.status == "ACCEPTED") {
                        if (alert("Votre paiement a été effectué avec succès")) {
                            window.location.reload();
                        }
                    }
                });
            }

        </script>
    </body>

    
</html>