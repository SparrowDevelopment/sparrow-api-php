<?php
namespace SparrowSamples;

require_once "SamplesGenerator.generated.php";

$generator = new SamplesGenerator();
$generator->generate();
$log = $generator->log;