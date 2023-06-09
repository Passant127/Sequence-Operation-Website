<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "genome";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$seq = $_POST['substring'];
$seqq = strtoupper($seq);
$gene = $_POST['choose'];
$operation = $_POST['operation'];
$_SESSION['operation'] = $operation;
if(strlen($seqq)>1 && strlen($gene) >= 1){
    $operation = "Wrong Input";
    $_SESSION['operation'] = $operation;
}elseif(strlen($seqq) > 1 && strlen($gene) < 1){
    $sequence = $seqq;
}elseif(strlen($seqq) < 1 && strlen($gene) >= 1){
    $sql = "SELECT gene_sequence FROM genes WHERE gene_id = $gene";
    $ressql = $conn->query($sql);
    $sqlrow = $ressql->fetch_assoc();
    $sequence = $sqlrow['gene_sequence'];
}



//GC Function
function GC($sequence)
{
    $nChar = 'N';
    $gChar = 'G';
    $cChar = 'C';
    $nBases = substr_count($sequence, $nChar);
    $gcPercent = (substr_count($sequence, $gChar) + substr_count($sequence, $cChar)) / (strlen($sequence) - $nBases)*100;
    return number_format($gcPercent,2);

}
//-------------------------------------------------
//Complementary Function


function Complement($sequence)
{
    $newseq = '';
    for ($i = 0; $i < strlen($sequence); $i++) {
        $char = $sequence[$i];
        if ($char === 'A') {
            $newseq .= 'T';
        } elseif ($char == 'T') {
            $newseq .= 'A';
        } elseif ($char == 'C') {
            $newseq .= 'G';
        } elseif ($char == 'G') {
            $newseq .= 'C';
        }
    }
    return $newseq;
}
//-------------------------------------------------
// Protein Translation
function proteinTranslation($sequence)
{
    $sequence = rnaToDna($sequence);

    $aminos = [
        "ATT" => "I",
        "ATC" => "I",
        "ATA" => "I",
        "CTT" => "L",
        "CTC" => "L",
        "CTA" => "L",
        "CTG" => "L",
        "TTA" => "L",
        "TTG" => "L",
        "GTT" => "V",
        "GTC" => "V",
        "GTA" => "V",
        "GTG" => "V",
        "TTT" => "F",
        "TTC" => "F",
        "ATG" => "M",
        "TGT" => "C",
        "TGC" => "C",
        "GCT" => "A",
        "GCC" => "A",
        "GCA" => "A",
        "GCG" => "A",
        "GGT" => "G",
        "GGC" => "G",
        "GGA" => "G",
        "GGG" => "G",
        "CCT" => "P",
        "CCC" => "P",
        "CCA" => "P",
        "CCG" => "P",
        "ACT" => "T",
        "ACC" => "T",
        "ACA" => "T",
        "ACG" => "T",
        "TCT" => "S",
        "TCC" => "S",
        "TCA" => "S",
        "TCG" => "S",
        "AGT" => "S",
        "AGC" => "S",
        "TAT" => "Y",
        "TAC" => "Y",
        "TGG" => "W",
        "CAA" => "Q",
        "CAG" => "Q",
        "AAT" => "N",
        "AAC" => "N",
        "CAT" => "H",
        "CAC" => "H",
        "GAA" => "E",
        "GAG" => "E",
        "GAT" => "D",
        "GAC" => "D",
        "AAA" => "K",
        "AAG" => "K",
        "CGT" => "R",
        "CGC" => "R",
        "CGA" => "R",
        "CGG" => "R",
        "AGA" => "R",
        "AGG" => "R",
        "TAA" => "*",
        "TAG" => "*",
        "TGA" => "*"
    ];
    //*  is stop codon
    $Codons = str_split($sequence, 3);

    $proteinSequence = "";

    foreach ($Codons as $sequenceCodon) {

        if (isset($aminos[$sequenceCodon]) == true) {

            if ($aminos[$sequenceCodon] == "*") {
                break;
            } else {
                $proteinSequence .= $aminos[$sequenceCodon];

            }




        }

    }

    return $proteinSequence;
}
//-------------------------------------------------
//Reverse complement
function reverseComplement($sequence)
{
    $reversedsequence = strrev(strtoupper($sequence));
    return $reversedsequence;

}
//-------------------------------------------------
//Filter n bases
function nBasesFilter($sequence)
{
    $nChar = 'N';
    $sequence = str_replace($nChar, '', $sequence);
    return $sequence;
}
//------------------------------------------
//TranscriPtion from dna to Rna
function trancription($sequence)
{
    $sequence = str_replace("T", "U", $sequence);
    return $sequence;
}
//---------------------------
//From Rna to dna
function rnaToDna($sequence)
{
    $sequence = str_replace("U", "T", $sequence);
    return $sequence;
}


//-------------------------------------------------------------------------------------------------------

//Conditions
if ($operation == 'GC_Percentage') {
    $_SESSION['result'] = "Your GC Percentage is : " . GC($sequence) . "%";

} elseif ($operation == 'Complement') {

    $_SESSION['result'] = "Your Complement is : " . Complement($sequence);




} elseif ($operation == "Translation") {
    $_SESSION['result'] = "Your Protein Sequence is : " . proteinTranslation($sequence);




} elseif ($operation == "Reverse_Complement") {
    $sequencecomp = Complement($sequence);


    $_SESSION['result'] = "Your  Sequence before reversed is : " . $sequencecomp . "\n\r" . "Your  Sequence after reversed is : " . reverseComplement($sequencecomp);

} elseif ($operation == "nBases_Count") {
    $_SESSION['result'] = "Your  Sequence after filtering : " . nBasesFilter($sequence);

} elseif ($operation == "toRNA") {
    $_SESSION['result'] = "Your  Sequence in RNA : " . trancription($sequence);

} elseif ($operation == "toDNA") {
    $_SESSION['result'] = "Your  Sequence after filtering : " . rnaToDna($sequence);

}elseif($operation == "Wrong Input"){
    $_SESSION['result'] = "Choose Only One Sequence";
}
header("Location: result.php");
exit;
?>