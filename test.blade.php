// Vérifiez si le bouton "Aller/Retour" a été coché
$roundTrip = $request->input('roundTrip', false);

// Si le bouton "Aller/Retour" est coché, multipliez le prix par 2, sinon laissez-le inchangé
if ($roundTrip) {
$prix *= 2;
}
dd($prix);
