<?php
//ob_get_clean(); // vide le tampon de sortie
$this->load->library('Fpdf');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('application/images/logo.png', 10, 10, 50, 30);
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(190, 30, utf8_decode('Gestion des conférences'), 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(51, 133, 255);
$pdf->SetTextColor(0, 0, 0);
$pdf->ln(5);
$pdf->Cell(0, 12, 'Statistiques du ' . date("d-m-Y") . utf8_decode(" à ") . date("H:i"), 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 0, 'Responsable : ' . $_SESSION["prenom"] . " " . $_SESSION["nom"], 0, 1, 'L');

$pdf->SetFillColor(150, 180, 230);

$pdf->ln(15);

//$tmpVarX = $pdf->GetX();
//$tmpVarY = $pdf->GetY();

/*$pdf->MultiCell(30, 10, utf8_decode("Nombre de Conférences"), 1, 1, 'C', 1);

$pdf->SetXY($tmpVarX + 30, $tmpVarY);
$tmpVarX = $pdf->GetX();
$tmpVarY = $pdf->GetY();

$pdf->MultiCell(30, 10, utf8_decode("Nombre de prestation"), 1, 1, 'C', 1);

$pdf->SetXY($tmpVarX + 30, $tmpVarY);
$tmpVarX = $pdf->GetX();
$tmpVarY = $pdf->GetY();

$pdf->MultiCell(30, 7, utf8_decode("Conférence avec le plus de prestation"), 1, 1, 'C', 1);

$pdf->SetXY($tmpVarX + 30, $tmpVarY);
$tmpVarX = $pdf->GetX();
$tmpVarY = $pdf->GetY();

$pdf->MultiCell(30, 7, utf8_decode("Conférence avec le moins de prestation"), 1, 1, 'C', 1);

$pdf->SetXY($tmpVarX + 30, $tmpVarY);
$tmpVarX = $pdf->GetX();
$tmpVarY = $pdf->GetY();

$pdf->MultiCell(30, 5, "Prestation avec le plus de participants", 1, 1, 'C', 1);

$pdf->SetXY($tmpVarX + 30, $tmpVarY);
$tmpVarX = $pdf->GetX();
$tmpVarY = $pdf->GetY();
$pdf->MultiCell(30, 5, "Prestation avec le moins de participants", 1, 1, 'C', 1);

foreach ($nbconf as $unNbconf) {
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(30, 5, $unNbconf, 1, 0, 'C', 1);
}

foreach ($nbpresta as $unNbpresta) {
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(30, 5, $unNbpresta, 1, 0, 'C', 1);
}

foreach ($confpluspresta as $laConfpluspresta) {
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(30, 5, $laConfpluspresta, 1, 0, 'C', 1);
}

foreach ($confmoinspresta as $laConfmoinspresta) {
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(30, 5, $laConfmoinspresta, 1, 0, 'C', 1);
}

foreach ($maxparticipant as $leMaxparticipant) {
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(30, 5, $leMaxparticipant, 1, 0, 'C', 1);
}

foreach ($minparticipant as $leMinparticipant) {
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(30, 5, $leMinparticipant, 1, 0, 'C', 1);
}*/

$pdf->Cell(0, 12, utf8_decode('Informations générales'), 0, 1, 'L');

$pdf->Cell(60, 5, utf8_decode('Nombre de conférences'), 1, 0, 'C', 1);
$pdf->Cell(60, 5, utf8_decode('Nombre de prestations'), 1, 0, 'C', 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->ln(5);

foreach ($nbconf as $unNbconf) {
    $pdf->Cell(60, 5, $unNbconf, 1, 0, 'C', 1);
}

foreach ($nbpresta as $unNbpresta) {
    $pdf->Cell(60, 5, $unNbpresta, 1, 0, 'C', 1);
}

$pdf->ln(12.5);
$pdf->Cell(0, 12, utf8_decode('Conférence avec le plus de prestations'), 0, 1, 'L');

$pdf->SetFillColor(150, 180, 230);
$pdf->Cell(60, 5, 'code', 1, 0, 'C', 1);
$pdf->Cell(60, 5, utf8_decode('thème'), 1, 0, 'C', 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->ln(5);

foreach ($confpluspresta as $laConfpluspresta) {
    $pdf->Cell(60, 5, $laConfpluspresta, 1, 0, 'C', 1);
}

$pdf->ln(12.5);
$pdf->Cell(0, 12, utf8_decode('Conférence avec le moins de prestations'), 0, 1, 'L');

$pdf->SetFillColor(150, 180, 230);
$pdf->Cell(60, 5, 'code', 1, 0, 'C', 1);
$pdf->Cell(60, 5, utf8_decode('thème'), 1, 0, 'C', 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->ln(5);

foreach ($confmoinspresta as $laConfmoinspresta) {
    $pdf->Cell(60, 5, $laConfmoinspresta, 1, 0, 'C', 1);
}

$pdf->ln(12.5);
$pdf->Cell(0, 12, utf8_decode('Prestation avec le plus de participants'), 0, 1, 'L');

$pdf->SetFillColor(150, 180, 230);
$pdf->Cell(30, 5, 'id', 1, 0, 'C', 1);
$pdf->Cell(30, 5, utf8_decode('horaire'), 1, 0, 'C', 1);
$pdf->Cell(30, 5, utf8_decode('duree'), 1, 0, 'C', 1);
$pdf->Cell(30, 5, utf8_decode('places'), 1, 0, 'C', 1);
$pdf->Cell(30, 5, utf8_decode('date'), 1, 0, 'C', 1);
$pdf->Cell(30, 5, utf8_decode('salle'), 1, 0, 'C', 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->ln(5);

foreach ($maxparticipant as $lemaxparticipant) {
    $pdf->Cell(30, 5, $lemaxparticipant, 1, 0, 'C', 1);
}

$pdf->ln(12.5);
$pdf->Cell(0, 12, utf8_decode('Prestation avec le plus de participants'), 0, 1, 'L');

$pdf->SetFillColor(150, 180, 230);
$pdf->Cell(30, 5, 'id', 1, 0, 'C', 1);
$pdf->Cell(30, 5, utf8_decode('horaire'), 1, 0, 'C', 1);
$pdf->Cell(30, 5, utf8_decode('duree'), 1, 0, 'C', 1);
$pdf->Cell(30, 5, utf8_decode('places'), 1, 0, 'C', 1);
$pdf->Cell(30, 5, utf8_decode('date'), 1, 0, 'C', 1);
$pdf->Cell(30, 5, utf8_decode('salle'), 1, 0, 'C', 1);
$pdf->SetFillColor(255, 255, 255);
$pdf->ln(5);

foreach ($minparticipant as $leminparticipant) {
    $pdf->Cell(30, 5, $leminparticipant, 1, 0, 'C', 1);
}

$pdf->Output();
