<?php

namespace App\Helpers;

use Carbon\Carbon;

class Weeks
{
    private $numberOfWeeks;
    private $weeks;
    private $startWeekDay;
    private $endWeekDay;
    private $month;
    private $year;
    private $day;

    /**
     * Construtor da classe. Define o n mero de semanas, o primeiro e o   ltimo dia da semana.
     *
     * @param int $numberOfWeeks N mero de semanas. Padr o: 4.
     * @param string $startWeekDay Primeiro dia da semana. Padr o: Carbon::SUNDAY.
     * @param string $endWeekDay   ltimo dia da semana. Padr o: Carbon::SATURDAY.
     */
    public function __construct(
        int $numberOfWeeks = 4, 
        $startWeekDay = Carbon::SUNDAY, 
        $endWeekDay = Carbon::SATURDAY
    ) {
        $this->numberOfWeeks = $numberOfWeeks;
        $this->startWeekDay = $startWeekDay;
        $this->endWeekDay = $endWeekDay;
        $this->month = Carbon::now()->format('m');
        $this->year = Carbon::now()->format('Y');
        $this->day = Carbon::now()->format('d');
    }

    /**
     * Retorna um array de semanas com o formato
     * [
     *     'firstDay' => 'Y-m-d',
     *     'lastDay'  => 'Y-m-d'
     * ]
     * 
     * @return array
     */
    public function getWeeks()
    {
        $this->makeWeeks();
        return $this->weeks;
    }

    /**
     * Monta um array de semanas com o formato
     * [
     *     'firstDay' => 'Y-m-d',
     *     'lastDay' => 'Y-m-d'
     * ],
     * onde a primeira semana   a semana atual e as demais s o semanas anteriores,
     * at   quantidade de semanas informada no construtor.
     */
    private function makeWeeks(): void
    {
        
        $currentWeek = $this->getCurrentWeek();
        $weeks = [
            [
                'firstDay' => $currentWeek['firstDayCurrentWeek']->format('Y-m-d'),
                'lastDay' => $currentWeek['lastDayCurrentWeek']->format('Y-m-d')
            ]
        ];

        for ($i = 1; $i < $this->numberOfWeeks; $i++) {
            $weeks[] = [
                'firstDay' => $this->getCurrentWeek()['firstDayCurrentWeek']->subWeek($i)->format('Y-m-d'),
                'lastDay' => $this->getCurrentWeek()['lastDayCurrentWeek']->subWeek($i)->format('Y-m-d')
            ];            
        }

        $this->weeks = array_reverse($weeks);
    }

    /**
     * Retorna um array com as datas do primeiro e último dia da semana atual.
     * 
     * @return array
     */
    private function getCurrentWeek()
    {
        return [
            'firstDayCurrentWeek' => Carbon::create(
                                        $this->year, 
                                        $this->month, 
                                        $this->day
                                    )->startOfWeek(Carbon::SUNDAY),    
            'lastDayCurrentWeek' => Carbon::create(
                                        $this->year, 
                                        $this->month, 
                                        $this->day
                                    )->endOfWeek(Carbon::SATURDAY)
        ];
    }
}