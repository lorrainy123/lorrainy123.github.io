

var chart = c3.generate({
    data: {
        columns: [
            ['鬼来电', 6.4],
            ['闪灵', 8.3],
            ['遗传厄运', 7.6],
            ['逃出绝命镇', 7.8],
            ['解剖学教室', 5.3],
            ['致命ID', 7.8],
            ['禁闭岛', 8],
            ['生吃', 7.2],
            ['汉江怪物', 7.4],
            ['死神来了', 6.8],
            ['死寂', 6.4],
            ['救命解药', 6.3],
            ['恐怖游轮', 7.6],
            ['忌日快乐', 7],
            ['异形：契约', 6.7],
            ['小丑回魂', 7.4],
            ['孤儿怨', 7.2],
            ['天赐之女', 6.9],
            ['咒怨', 6.8],
            ['万能钥匙', 7]

        ],

        type: 'bar'
    },

    bar: {
        width: {
            ratio: 1 // this makes bar width 50% of length between ticks
        }

    }


});
