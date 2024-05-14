<?php
    $raw = '22.11.1968';
    $start = DateTime::createFromFormat('d.m.Y', $raw);
    echo "Data de inicio:" .$start->format('Y-m-d') . "\n";

    // cria uma copia de $start e adiciona um mês e 6 dias

    $end = clone $start;
    $end->add(new DateInterval('P1M6D'));


    $diff = $end->diff($start);
    echo "Diferença:" .$diff->format('%m mês, %d dias (total: %a dias)') . "\n";
    // Diferença: 1 mês, 6 dias (total: 37 dias)

    if($start < $end) {
        echo "Começa antes do fim!\n";
    }

    // mostra todas as quinta-feiras entre $start e $end

    $periodInterval = DateInterval::createFromDateString('first thursday');

    $periodIterator = new DatePeriod($start,$periodInterval,$end,
    DatePeriod::EXCLUDE_START_DATE);

    foreach($periodIterator as $date) {
        //mostra cada data no período
        echo $date->format('d-m-Y'). " ";
    }
?>