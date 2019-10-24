const depart = 'Bordeaux'
const arrivee = 'Paris'
const distanceTotale = 500
let distanceParcourue = 0
const dureeTotale = 350
let dureeSurLaRoute = 0
let vitesse = 0
let pause = 0
let tempsAvantPause = 0

function afficherStats()
{
    console.log(`Le camion roule à ${vitesse}km/h. Il est sur la route depuis ${duree}min en comptant les ${pause}min de pause`);
    
}

function accelerer()
{
    while (vitesse < 90)
    {
        vitesse += 10
        dureeSurLaRoute += 1
    }
}

function arret()
{
    while (vitesse > 0)
    {
        vitesse -= 10
        dureeSurLaRoute += 1
    }
}

function trajet(arrivee, distanceTotale)
{
    while (distanceTotale > distanceParcourue)
    {
        accelerer()
        distanceParcourue += 1.5
        dureeSurLaRoute += 1
    }

    console.log(`Vous êtes arrivé à ${arrivee} en ${dureeSurLaRoute} min`);
    
}


trajet('Paris', 500)