<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PregnancyController extends Controller
{
    public function index()
    {
        $pregnancyData = [
            'Trimester 1' => [
                'range' => 'Minggu 1-12',
                'weeks' => [
                    1 => [
                        'title' => 'Perkembangan Janin Minggu Ke-1',
                        'image' => 'img/Minggu-01.png',
                        'size' => 'Chia Seed',
                        // 'weight' => '~1 gr',
                        // 'height' => '~0.1 cm',
                        'contents' => [
                            '<p>Pada tahapan ini, sebagian Bunda mulai merasakan perubahan pada tubuh. Biasanya, gejalanya hampir mirip dengan sebelum menstruasi. Seperti merasakan payudara sakit, mual, kadang lelah disertai lesu. Namun, pada minggu-minggu ini Bunda justru tidak mendapatkan menstruasi.</p>',
                            '<p>Itu sebabnya, pada minggu pertama banyak yang tidak menyadari kehamilannya. Selama periode ini, terjadi pembuahan sel telur di tubuh ibu dan zigot menempel ke rahim. Janin baru saja terbentuk dan mulai tumbuh dari dua sel.</p>',
                            '<p>Bentuk perut biasanya akan mulai terlihat saat kehamilan memasuki usia 16 minggu. Sedangkan gejalanya baru terasa di kehamilan setelah dua minggu. Untuk janinnya sendiri belum bisa dilihat, karena Bunda belum dinyatakan benar-benar hamil di minggu pertama.</p>',
                            '<p>Pada perkembangan janin minggu ke-1, banyak Bunda yang belum sadar sedang hamil. Tapi, kehamilan bisa dirasakan dengan ada tanda-tanda yang mirip menstruasi nih. Misalnya, payudara sakit, Bun.</p>',
                        ],
                        'mom_tips' => [
                            [
                                'title' => 'Mencatat Siklus Menstruasi Terakhir',
                                'desc'  => 'Sangat penting mencatat kapan tanggal terakhir menstruasi untuk membantu menghitung usia kehamilan.'
                            ],
                            [
                                'title' => 'Mencatat Riwayat Kesehatan Keluarga',
                                'desc'  => 'Mencatat riwayat kesehatan Bunda dan Ayah, seperti kelainan genetik atau kromosom akan membantu mencari akar masalah saat terjadi gangguan kehamilan.'
                            ],
                            [
                                'title' => 'Memeriksakan Kehamilan dengan Test Pack',
                                'desc'  => 'Sebelum benar-benar yakin untuk mengunjungi dokter, Bunda bisa melakukan tes kehamilan awal dengan bantuan test pack.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Tidak Melakukan Diet',
                                'desc'  => 'Di awal kehamilan sangat penting menjaga asupan makanan sehat agar membantu janin tumbuh optimal.'
                            ],
                            [
                                'title' => 'Tidak Mengonsumsi Obat tanpa Resep Dokter',
                                'desc'  => 'Ibu hamil dilarang mengonsumsi obat sembarangan. Lebih baik konsultasikan dulu dengan dokter jika gejala awal kehamilan sudah sangat tidak nyaman dan mengganggu.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Mual',
                                'desc'  => 'Ketika sel telur yang telah dibuahi menempel di rahim, akan meningkatkan hormon hCG yang diduga memicu mual.'
                            ],
                            [
                                'title' => 'Pusing',
                                'desc'  => 'Lonjakan hormon kehamilan dan peningkatan volume darah di awal kehamilan membuat Bunda pusing.'
                            ],
                        ],
                    ],

                    2 => [
                        'title' => 'Perkembangan Janin Minggu Ke-2',
                        'image' => 'img/Minggu-02.png',
                        'size' => 'Chia Seed',
                        // 'weight' => '~1 gr',
                        // 'height' => '~0.1 cm',
                        'contents' => [
                            '<p>Memasuki usia kehamilan dua minggu, janin mulai terbentuk dan tubuh siap untuk berovulasi. Ovarium akan melepaskan sel telur yang sudah matang ke dalam tuba falopi.</p>',
                            '<p>Sel telur akan menghasilkan hormon human chorionic gonadotropin (HCG) sekitar empat hari setelah dibuahi. Namun, hormon ini baru bisa dideteksi lewat tes kehamilan sekitar satu minggu lagi. Sama seperti minggu sebelumnya, janin juga belum bisa dilihat di minggu kedua kehamilan.</p>',
                            '<p>Di usia dua minggu kehamilan, ukuran dan berat janin belum bisa dibandingkan dengan suatu bentuk, seperti buah atau benda. Hanya dalam waktu 40 minggu, janin akan tumbuh dari ukuran biji kecil hingga seukuran buah semangka.</p>',
                            '<p>Pada perkembangan janin minggu ke-2, Bunda juga belum bisa benar-benar memastikan apakah sedang mengandung atau tidak. Tapi, janin sendiri sudah terbentuk seukuran biji yang sangat kecil.</p>'
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Tes Ovulasi',
                                'desc'  => 'Gunakan tes ovulasi untuk mendeteksi hormon luteinizing (LH), sehingga tahu kapan akan ovulasi.'
                            ],
                            [
                                'title' => 'Periksa Suhu Tubuh',
                                'desc'  => 'Periksa suhu tubuh pada pagi hari setelah bangun tidur dengan termometer untuk mengetahui waktu ovulasi.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Menjaga Berat Badan',
                                'desc'  => 'Kontrol kenaikan dan penurunan berat badan dengan konsumsi makanan bergizi.'
                            ],
                            [
                                'title' => 'Jangan Sembarangan Minum Obat',
                                'desc'  => 'Bunda tidak disarankan mengonsumsi obat tanpa resep dokter.'
                            ],
                            [
                                'title' => 'Berhenti Mengonsumsi Kafein',
                                'desc'  => 'Di awal kehamilan ada baiknya Bunda mulai menghindari minum kopi, teh, dan segala minuman yang mengandung kafein.'
                            ],
                            [
                                'title' => 'Konsumsi Vitamin Prenatal',
                                'desc'  => 'Untuk mendukung tumbuh kembang otak janin, konsultasikan ke dokter vitamin prenatal apa yang bagus untuk dikonsumsi.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Mual',
                                'desc'  => 'Mual akan mulai terasa di pagi hari, namun biasanya akan hilang saat siang atau malam hari.'
                            ],
                            [
                                'title' => 'Nyeri Perut',
                                'desc'  => 'Beberapa Bunda mengalami nyeri perut dengan sedikit perdarahan saat embrio menanamkan dirinya ke dinding rahim, mirip seperti dimulainya menstruasi.'
                            ],
                            [
                                'title' => 'Terlambat Menstruasi',
                                'desc'  => 'Pada minggu kedua kehamilan, biasanya Bunda akan mulai menyadari sudah terlambat menstruasi.'
                            ],
                        ],
                    ],

                    3 => [
                        'title' => 'Perkembangan Janin Minggu Ke-3',
                        'image' => 'img/Minggu-03.png',
                        'size' => 'Chia Seed',
                        'weight' => '0.1 gr',
                        'height' => '0,1 - 0,2 mm',
                        'contents' => [
                            '<p>
                                Pada usia kehamilan tiga minggu, janin sudah mulai berkembang. Pada usia ini, sel telur yang dibuahi tumbuh dari zigot menjadi sel yang disebut blastokista.
                            </p>',
                            '<p>
                                Minggu ini sangat penting karena sel telur dibuahi dan tertanam di lapisan rahim, serta mulai berkembang dengan bantuan oksigen dan nutrisi yang diterima melalui pembuluh darah.</p>',
                            '<p> 
                                Selama periode ini, janin berbentuk bola kecil atau blastokista yang akan berkembang menjadi plasenta dan mulai memproduksi hormon Human chorionic gonadotropin (HCG). Hormon ini menghentikan produksi sel telur dan memicu peningkatan produksi estrogen dan progesteron. <p>',
                            '<p>
                                Pada perkembangan janin minggu ke-3, janin sudah berbentuk bola kecil dan selanjutnya akan berkembang menjadi plasenta. Bentuknya masih lebih kecil dari sebutir garam.
                            </p>'
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Melakukan Tes Kehamilan',
                                'desc'  => 'Lakukan tes kehamilan dengan test pack.'
                            ],
                            [
                                'title' => 'Konsumsi Asam Folat',
                                'desc'  => 'Konsumsi makanan bernutrisi yang mengandung asam folat, zat besi, dan kalsium.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Mencari Informasi Mengenai Kehamilan',
                                'desc'  => 'Banyak membaca buku tentang kehamilan trimester pertama.'
                            ],
                            [
                                'title' => 'Konsumsi Vitamin Prenatal',
                                'desc'  => 'Lanjutkan konsumsi vitamin prenatal.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Mual',
                                'desc'  => 'Mual akan mulai terasa di pagi hari, namun biasanya akan hilang saat siang atau malam hari.'
                            ],
                            [
                                'title' => 'Nyeri PerutPayudara Bengkak',
                                'desc'  => 'Pada minggu ketiga kehamilan biasa payudara Bunda akan sedikit bengkak dan nyeri.'
                            ],
                            [
                                'title' => 'Bercak-bercak',
                                'desc'  => 'Pada akhir minggu ketiga kehamilan, sebagian Bunda akan mengalami bercak-bercak dari vagina. Meski akan lebih sering terjadi selama minggu keempat, paling cepat terjadi enam hari setelah ovulasi, atau pada akhir minggu ketiga.'
                            ],
                        ],
                    ],

                    4 => [
                        'title' => 'Perkembangan Janin Minggu Ke-4',
                        'image' => 'img/Minggu-04.png',
                        'size' => 'Biji Wijen',
                        'weight' => '1 gr',
                        'height' => '0,03 - 0,1 cm',
                        'contents' => [
                            '<p>
                               Perkembangan janin di usia kehamilan empat minggu sudah bisa terlihat. Pada tahap ini, sel-sel terpisah menjadi tiga lapisan berbeda yang selanjutnya akan berkembang menjadi struktur tubuh.
                            </p>',
                            '<p>
                                Perkembangan janin di usia kehamilan empat minggu sudah bisa terlihat. Pada tahap ini, sel-sel terpisah menjadi tiga lapisan berbeda yang selanjutnya akan berkembang menjadi struktur tubuh.
                            </p>',
                            '<p> 
                              Pada perkembangan janin minggu ke-4, calon bayi yang mulai terbentuk disebut blastokista dan ukurannya masih lebih kecil dari biji poppy. Bentuk perut pun sudah mulai terlihat tapi masih samar sekali.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Tes Kehamilan',
                                'desc'  => 'Lakukan tes kehamilan jika periode menstruasi terlewat.'
                            ],
                            [
                                'title' => 'Mencari Dokter Kandungan',
                                'desc'  => 'Saat menstruasi sudah telat, sebaiknya Bunda mencari dokter kandungan dan membuat daftar kunjungan pertama. Dokter akan berbicara tes tapis seperti pemeriksaan darah, urin, ultrasonografi dan NIPS (Non Invasive Prenatal Screening).'
                            ],
                            [
                                'title' => 'Berhenti Merokok dan Minum Alkohol',
                                'desc'  => 'Bunda sangat tidak disarankan merokok dan minum alkohol ketika hamil. Hentikan kebiasaan tersebut agar tidak mengganggu perkembangan janin.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Mengonsumsi Makanan Sehat',
                                'desc'  => 'Konsumsi makanan mengandung asam lemak omega 3 dan DHA.'
                            ],
                            [
                                'title' => 'Konsumsi Vitamin',
                                'desc'  => 'Konsumsi vitamin D untuk kesehatan tulang.'
                            ],
                            [
                                'title' => 'Konsumsi Vitamin Prenatal',
                                'desc'  => 'Konsumsi vitamin prenatal yang mengandung asam folat.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Mual',
                                'desc'  => 'Saat janin mulai tumbuh di usia kehamilan lima minggu, Bunda akan merasa mual, kram, dan muncul bercak, nyeri payudara, dan mudah lelah.'
                            ],
                            [
                                'title' => 'Perubahan Suasana Hati',
                                'desc'  => 'Bunda juga mengalami perubahan suasana hati yang disebabkan fluktuasi hormon kehamilan. Kondisi ini paling drastis terjadi selama 12 minggu pertama kehamilan.'
                            ],
                        ],
                    ],

                    5 => [
                        'title' => 'Perkembangan Janin Minggu Ke-5',
                        'image' => 'img/Minggu-05.png',
                        'size' => 'Biji Padi',
                        'weight' => '1 gr',
                        'height' => '0,1 cm',
                        'contents' => [
                            '<p>
                              Memasuki usia kehamilan lima minggu, organ tubuh bayi bersiap untuk terbentuk. Di minggu ini, detak jantung juga mulai muncul.
                            </p>',
                            '<p>
                               Embrio di minggu ini memiliki tiga lapisan. Pertama, lapisan ektoderm luar yang akan membentuk sistem saraf, telinga, mata, dan jaringan ikat. Kedua, lapisan dalam atau endoderm, yang akan tumbuh menjadi organ-organ internal seperti paru-paru, usus, dan kandung kemih.
                            </p>',
                            '<p> 
                                Terakhir yaitu mesoderm tengah untuk membentuk jantung dan sistem peredaran darah. Dalam beberapa minggu, mesoderm akan berkembang menjadi tulang, otot, ginjal, dan organ reproduksi.
                             <p>',
                            '<p> 
                                 Pertumbuhan saraf dimulai ketika selapis sel di bagian punggung embrio melipat di bagian tengah sehingga membentuk tabung. Inilah yang disebut tabung saraf sebagai tempat otak, tulang belakang, dan sumsum tulang belakang serta saraf akan tumbuh. 
                             <p>',
                            '<p> 
                                Pada perkembangan janin minggu ke-5, organ sudah siap terbentuk dan detak jantung mulai muncul. Ukurannya sendiri sudah naik menjadi sebesar biji buah stroberi dengan berat 1 gram
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Konsultasi ke Dokter Kandungan',
                                'desc'  => 'Pada usia kehamilan lima minggu biasanya berbagai tanda sudah muncul, termasuk telat menstruasi. Saatnya mengunjungi dokter kandungan untuk pertama kali.'
                            ],
                            [
                                'title' => 'Hindari Rokok dan Kafein',
                                'desc'  => 'Berhenti merokok agar tidak mengganggu kadar oksigen yang dibutuhkan bayi. Sedangkan kafein yang berlebihan dapat meningkatkan risiko berat badan lahir rendah.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Konsumsi Makanan Bergizi',
                                'desc'  => 'Ibu hamil sangat disarankan mengonsumsi makanan sehat untuk mencegah anak stanting. Hal itu dapat dimulai dari awal kehamilan yang masuk dalam periode 1000 hari pertama kehidupan anak.'
                            ],
                            [
                                'title' => 'Hindari Makanan Bermerkuri',
                                'desc'  => 'Hindari makanan yang mengandung merkuri atau produk susu yang tidak dipasteurisasi. Misal ikan dari laut yang kadar pencemaran limbahnya tinggi.'
                            ],
                            [
                                'title' => 'Konsumsi Vitamin Prenatal',
                                'desc'  => 'Konsumsi vitamin prenatal yang mengandung asam folat, serta kandungan asam lemak omega 3, DHA, dan EPA.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Morning Sickness',
                                'desc'  => 'Di usia kehamilan lima minggu, ibu hamil akan merasa mual, pusing, sering buang air kecil, kram perut, pendarahan vagina, kelelahan, perubahan payudara, dan perubahan suasana hati.'
                            ],
                        ],
                    ],

                    6 => [
                        'title' => 'Perkembangan Janin Minggu Ke-6',
                        'image' => 'img/Minggu-06.png',
                        'size' => 'Buah Blueberry',
                        'weight' => '1 gr',
                        'height' => '0,2 cm',
                        'contents' => [
                            '<p>
                              Memasuki usia kehamilan enam minggu, hormon kehamilan yakni hCG (human Chorionic Gonadotropin) dapat terdeteksi dalam jumlah sedikit di urin. Sedangkan janin sudah berkembang pesat. Bentuknya kini terlihat seperti kecebong dengan ekor kecil.
                            </p>',
                            '<p>
                              Pada minggu ini, jantung janin dalam kandungan juga sudah berdetak dengan irama teratur. Di minggu ini otak bayi sudah mulai terbentuk.
                            </p>',
                            '<p> 
                                Organ utama, seperti ginjal telah mulai berkembang. Sedangkan tabung neural yang menghubungkan otak dengan sumsum tulang belakang menutup.
                             <p>',
                            '<p> 
                                Anggota tubuh atas dan bawah dari embrio mulai berkembang yang akan menjadi lengan dan kaki. Usus berkembang di dalam tali pusat dan usus buntu juga sudah ada.
                             <p>',
                            '<p> 
                               Pada perkembangan janin minggu ke-6, ukuran sudah naik hingga sebesar biji buah delima atau kacang polong. Jantung berdetak teratur, dan otak bayi mulai terbentuk.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Konsumsi Makanan Sehat dan Bergizi',
                                'desc'  => 'Setelah konsultasi ke dokter, Bunda bisa mengikuti saran mengenai makanan sehat apa saja yang bagus untuk membantu perkembangan janin. Termasuk menghindari makanan pedas dan berminyak.'
                            ],
                            [
                                'title' => 'Mengonsumsi Vitamin Prenatal',
                                'desc'  => 'Konsumsi vitamin prenatal yang mengandung asam folat, serta kandungan asam lemak omega 3, DHA, dan EPA. Disarankan untuk mengonsumsi 400 mikrogram asam folat sehari ketika mencoba hamil sampai kehamilan 12 minggu.'
                            ],
                            [
                                'title' => 'Mencukupi Kebutuhan Air Minum',
                                'desc'  => 'Ibu hamil disarankan untuk menjaga asupan minum sebanyak 8-12 gelas perhari. Minum secara bertahap agar tidak mual. Bunda juga bisa mengurangi mual dengan mencoba air dingin.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Menghindari Berbaring Setelah Makan',
                                'desc'  => 'Bunda disarankan untuk tidak langsung berbaring atau bersandar setelah makan. Tujuannya agar tidak mual dan tidak heartburn, yaitu sensasi terbakar di tenggorokan dan bagian dada berdebar.'
                            ],
                            [
                                'title' => 'Makan Sedikit',
                                'desc'  => 'Bunda disarankan makan sedikit tapi sering. Sehingga tidak memicu mual dan muntah. Misalnya, makan 1-2 sendok setiap satu jam sekali. Tujuannya untuk menghindari muntah dan heartburn.'
                            ],
                            [
                                'title' => 'Mengonsumsi Obat Mual',
                                'desc'  => 'Saat konsultasi dengan dokter minggu lalu, biasanya Bunda yang mual hebat akan diresepkan obat. Kalau mual sudah sangat mengganggu bisa mulai dikonsumsi.'
                            ],
                            [
                                'title' => 'Pemeriksaan Lebih Lanjut',
                                'desc'  => 'Bunda akan ditawarkan pemeriksaan lainnya, bila ditemukan kelainan bawaan yakni amniosintesis dan CVS (Chorionic Villous Sampling).'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Morning Sickness',
                                'desc'  => 'Mual menjadi ciri awal kehamilan yang paling khas. Bunda bisa mengonsumsi teh atau air jahe, serta menghindari bau yang memicu rasa mual.'
                            ],
                            [
                                'title' => 'Pusing',
                                'desc'  => 'Atur waktu istirahat agar pusing tidak semakin parah. Bunda bisa mulai mencoba tidur lebih awal dan bangun lebih pagi. Sehingga ada waktu lebih lama di tempat tidur untuk menyiapkan tubuh sebelum berdiri.'
                            ],
                        ],
                    ],

                    7 => [
                        'title' => 'Perkembangan Janin Minggu Ke-7',
                        'image' => 'img/Minggu-07.png',
                        'size' => 'Buah Raspberry',
                        'weight' => '1 gr',
                        'height' => '0,2 cm',
                        'contents' => [
                            '<p>
                                Di usia kehamilan tujuh minggu, otak bayi dalam kandungan berkembang pesat. Bentuk wajah si kecil juga mulai terbentuk dan sudah seukuran blueberry. Meskipun masih sangat kecil, tapi dia berkembang 10 ribu kali lebih besar dibanding sebulan yang lalu.
                            </p>',
                            '<p>
                                Bila Bunda memeriksa melalui ultrasonografi (USG), ada bintik-bintik gelap yang menandai mata, lubang hidung, mulut, dan telinga.
                            </p>',
                            '<p> 
                                Sel-sel saraf di otak bayi tumbuh dengan kecepatan yang luar biasa, yaitu 100.000 sel per menit. Janin sudah mulai bergerak, namun Bunda belum bisa merasakannya.
                             <p>',
                            '<p> 
                                Jantungnya sudah terbagi menjadi bilik kanan dan kiri. Serta berdenyut 150 kali per menit atau kurang lebih dua kali kecepatan jantung orang dewasa. 
                             <p>',
                            '<p> 
                                Jantungnya sudah terbagi menjadi bilik kanan dan kiri. Serta berdenyut 150 kali per menit atau kurang lebih dua kali kecepatan jantung orang dewasa. 
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Mengonsumsi Makanan Sehat dan Bergizi',
                                'desc'  => 'Makanan bergizi sangat penting untuk membangun kekebalan tubuh, agar terlindung dari infeksi virus, serta memberikan perlindungan ekstra bagi tubuh. Pastikan memasukan buah dan sayur dalam menu sehari-hari untuk mengimbangi gizi Bunda selama hamil. Keduanya juga berperan untuk mencegah ibu hamil sembelit.'
                            ],
                            [
                                'title' => 'Menghindari Kosmetik Berbahaya',
                                'desc'  => 'Pastikan produk kecantikan yang digunakan aman untuk ibu hamil. Hindari pemakaian produk kecantikan yang mengandung merkuri BHA, Hydroquinone, Benzoil Peroxide, Retinoid, Rhodamin, dan amonia yang biasanya ditemukan di cat kuku atau cat rambut.'
                            ],
                            [
                                'title' => 'Minum Vitamin Prenatal yang Diresepkan Dokter',
                                'desc'  => 'Dokter biasanya akan meresepkan vitamin prenatal berupa asam folat, yang berpengaruh hingga 70 persen dalam pertumbuhan otak janin dibanding zat gizi lainnya.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Mencari Informasi Tentang Tes Prenatal',
                                'desc'  => 'Sejak minggu ketujuh kehamilan, Bunda sebaiknya mencari informasi tentang tes prenatal yang mungkin dilakukan. Seperti misalnya tes Chorionic villus sampling dan tes darah.'
                            ],
                            [
                                'title' => 'Menyiapkan Pakaian Longgar',
                                'desc'  => 'Pakaian longgar tidak hanya nyaman, tapi juga akan membantu mengurangi rasa sakit akibat heartburn.'
                            ],
                            [
                                'title' => 'Mulai Merawat Kulit',
                                'desc'  => 'Merawat kulit bukan berarti hanya untuk wajah, di sini Bunda disarankan untuk memulai memakai cream atau minyak esensial di bagian perut untuk mengurangi gatal dan perih akibat peregangan kulit.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Morning Sickness',
                                'desc'  => 'Pada kehamilan 7 minggu, Bunda biasanya akan merasakan mual dan muntah lebih dari minggu sebelumnya. Coba konsumsi jahe, jeruk, apel, pisang, biskuit dan makanan atau minuman dingin.'
                            ],
                            [
                                'title' => 'Ngidam',
                                'desc'  => 'Pada minggu ini, sebagian ibu hamil akan merasakan ngidam sesuatu. Ngidam berhubungan dengan perubahan Peptida Opioid Endogen (POE), beta endorfin, dan enkafelin yang meningkat selama hamil. Ketiganya berhubungan kuat dengan asupan makanan sehingga memicu ibu hamil cenderung menginginkan makanan tertentu.'
                            ],
                            [
                                'title' => 'Berjerawat',
                                'desc'  => 'Penyebab munculnya jerawat atau jerawat bertambah parah selama kehamilan karena berfluktuasinya hormon-hormon penyebab jerawat.'
                            ],
                        ],
                    ],

                    8 => [
                        'title' => 'Perkembangan Janin Minggu Ke-8',
                        'image' => 'img/Minggu-08.png',
                        'size' => 'Buah Anggur',
                        'weight' => '1 gr',
                        'height' => '1,6 cm',
                        'contents' => [
                            '<p>
                               Memasuki usia kehamilan delapan minggu, bentuk wajah sudah terlihat lebih jelas. Melalui pemeriksaan ultrasonografi (USG), kita bisa melihat telinga, bibir atas, dan ujung hidung bayi. Kelopak mata juga akan terbentuk dan melipat di minggu ini.
                            </p>',
                            '<p>
                               Selain itu, muncul jaringan selaput pada jari-jari tangan dan kaki bayi. Nah, di usia delapan minggu ini, jantung si kecil semakin kuat. Perkembangan otaknya semakin kompleks.
                            </p>',
                            '<p> 
                              Bagian ujung hidung sudah ada, lengannya kini menekuk pada siku dan sedikit membengkok. Gigi dan langit-langit mulut sudah mulai terbentuk. Kulit bayi setipis kertas, membuat pembuluh venanya terlihat. 
                             <p>',
                            '<p> 
                               Pada perkembangan janin minggu ke-8, ukuran bayi sudah sebesar buah raspberry dan bentuk wajahnya sudah jelas. Saat USG, sudah terlihat telinga, bibir atas dan ujung hidungnya.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Kunjungi Dokter',
                                'desc'  => 'Minggu ke-8 kehamilan saatnya kembali kontrol kandungan nih, Bunda. Tanyakan seputar perkembangan janin dan obat-obatan yang boleh dikonsumsi. Diskusikan juga penggunaan obat yang sedang dijalani sebelum hamil atau mulai hamil. Cari tahu apakah kondisi kerja berbahaya bagi bayi'
                            ],
                            [
                                'title' => 'Menjaga Pola Makan',
                                'desc'  => 'Pada minggu ini bisanya mual akan terasa lebih kuat, menyebabkan Bunda susah menelan makanan. Tapi, usakan untuk tetap menjaga asupan makan dan cairan agar tidak dehidrasi.'
                            ],
                            [
                                'title' => 'Pelajari Tentang Infeksi Kehamilan',
                                'desc'  => 'Pelajari soal infeksi kehamilan sebagai cara melindungi janin dan diri sendiri.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Buat Janji dengan Dokter Gigi',
                                'desc'  => 'Konsultasi ke dokter gigi untuk memeriksa kesehatan mulut, gigi, dan gusi.'
                            ],
                            [
                                'title' => 'Sediakan Camilan Sehat',
                                'desc'  => 'Bunda bisa menyiapkan berbagai camilan sehat untuk mengurangi mual dan perut perih yang mengganggu.'
                            ],
                            [
                                'title' => 'Latihan Kegel',
                                'desc'  => 'Sering melakukan latihan kegel untuk membantu menguatkan otot yang mendukung kandung kemih, rahim, dan usus.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Morning Sickness',
                                'desc'  => 'Pada minggu-minggu ini Bunda akan merasakan mual dan muntah hampir sepanjang hari. Pagi hari menjadi waktu yang paling parah, jadi disarankan untuk mengatur ulang jadwal kegiatan.'
                            ],
                            [
                                'title' => 'Kelelahan',
                                'desc'  => 'Perubahan hormon kehamilan membuat Bunda jadi mudah lelah, ditambah dengan susah tidur membuat jadwal istirahat harus diatur ulang.'
                            ],
                            [
                                'title' => 'Sering Buang Air Kecil',
                                'desc'  => 'Usahakan untuk tidak banyak minum jelang tidur. Selain itu, kurangi juga minuman yang mengandung kafein agar frekuensi buang air kecil tidak semakin meningkat.'
                            ],
                            [
                                'title' => 'Payudara Terasa Berbeda',
                                'desc'  => 'Payudara akan terasa lembut dan lebih berat.'
                            ],
                        ],
                    ],

                    9 => [
                        'title' => 'Perkembangan Janin Minggu Ke-9',
                        'image' => 'img/Minggu-09.png',
                        'size' => 'Buah Kurma',
                        'weight' => '1,9 gr',
                        'height' => '2,2 cm',
                        'contents' => [
                            '<p>
                               Memasuki usia sembilan minggu kehamilan, menjadi tahapan kritis pembentukan organ tubuh bayi. Organ reproduksi bayi mulai terbentuk, bersamaan dengan beberapa organ kunci lainnya, seperti pankreas dan kantung empedu. Pada minggu ini, ukuran bayi dua kali lipat.
                            </p>',
                            '<p>
                               Selain itu, jari-jari mungil sudah tumbuh lebih panjang, dan ujungnya sedikit membesar. Gerakan bayi dalam kandungan pun sudah bisa dirasakan Bunda.
                            </p>',
                            '<p> 
                              Lengannya sudah tumbuh dan tangannya kini melipat di pergelangan dan bertemu di atas jantung. Tungkainya memanjang dan kakinya bisa cukup panjang untuk bertemu di bagian depan tubuh.
                             <p>',
                            '<p> 
                               Pada perkembangan janin minggu ke-9, organ-organ penting sudah mulai terbentuk. Jari-jari janin sudah terbentuk, dan ukurannya pun naik menjadi sekitar 1,9 gram atau setara buah ceri nih, Bunda.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Istirahat Cukup',
                                'desc'  => 'Tubuh lebih sering lelah dan pusing akibat perubahan hormon. Usahakan untuk mendapat tidur siang. Kalau tidak memungkinkan, cobalah untuk tidur lebih cepat pada malam harinya.'
                            ],
                            [
                                'title' => 'Konsumsi Makanan Sehat',
                                'desc'  => 'Konsumsi makanan sehat yang mengandung banyak protein dan sedikit gula. Tapi ingat, jangan melakukan diet, Bunda.'
                            ],
                            [
                                'title' => 'Konsumsi Vitamin Prenatal',
                                'desc'  => 'Konsumsi vitamin prenatal yang mengandung asam folat untuk membantu perkembangan otak janin. Selain itu, mengonsumsi asam folat di awal kehamilan juga dapat mencegah bibir dan langit-langit mulut sumbing.'
                            ],
                            [
                                'title' => 'Olahraga Ringan',
                                'desc'  => 'Olahraga ringan seperti jalan-jalan selama 30 menit per hari.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Melakukan Meditasi',
                                'desc'  => 'Melakukan meditasi untuk mencegah stres.'
                            ],
                            [
                                'title' => 'Memilih Barang Rumah Tangga Yang Aman',
                                'desc'  => 'Memeriksa dan memilah peralatan rumah tangga, ganti dengan yang ramah lingkungan serta tidak berbahaya.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Konstipasi',
                                'desc'  => 'Pada usia kehamilan 9 minggu, ibu hamil akan merasa mudah lelah, sering buang air kecil, mulas, konstipasi atau sembelit. Perbanyak makan buah, sayur, dan asupan air untuk meredakan sembelit. Buah yang banyak air seperti semangka, dapat membantu menguranginya.'
                            ],
                            [
                                'title' => 'Payudara Gatal dan Nyeri',
                                'desc'  => 'Pada minggu ini, mungkin payudara Bunda akan mulai terasa lebih penuh, disertai gatal dan sedikit nyeri. Pakailah baju yang longgar untuk membuat tubuh lebih nyaman. Hindari mandi air hangat dan sabun yang memicu kulit makin gatal.'
                            ],
                        ],
                    ],

                    10 => [
                        'title' => 'Perkembangan Janin Minggu Ke-10',
                        'image' => 'img/Minggu-10.png',
                        'size' => 'Buah Tin',
                        'weight' => '3,9 gr',
                        'height' => '3 cm',
                        'contents' => [
                            '<p>
                               Di minggu ini, banyak perubahan terjadi pada perkembangan janin. Pada usia sepuluh minggu, jari-jari tangan dan kaki yang sebelumnya masih menempel, kini sudah terpisah dan tumbuh.
                            </p>',
                            '<p>
                               Tak hanya itu, otak bayi berkembang dengan kecepatan hampir 250.000 neuron setiap menit. Akhir dari tahap embrionik minggu ini, ditandai dengan kondisi janin yang rentan terhadap bahaya.
                            </p>',
                            '<p> 
                              Tubuhnya bukan lagi embrio, tapi sudah berbentuk janin dan tidak keriput. Tulang rawan terbentuk dan lekukan kecil di kaki berkembang menjadi lutut dan pergelangan kaki. Begitu pula dengan lengan, lengkap dengan siku sudah bisa melentur.
                             <p>',
                            '<p> 
                               Pada perkembangan janin minggu ke-10, sudah seukuran buah stroberi sehingga membuatnya tak lagi berbenuk embrio. Beratnya mencapai 3,9 gram, tapi masih sangat rentan terhadap bahaya lho, Bunda.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Penuhi Kebutuhan Cairan',
                                'desc'  => 'Penuhi kebutuhan cairan, 10 sampai 12 gelas per hari.'
                            ],
                            [
                                'title' => 'Konsumsi Vitamin Prenatal',
                                'desc'  => 'Melanjutkan konsumsi vitamin prenatal, diimbangi dengan makanan sehat dan tinggi nutrisi.'
                            ],
                            [
                                'title' => 'Mencari Tahu Tentang Tes dan Skrining yang Dibutuhkan Selama Hamil',
                                'desc'  => 'Prosedur ini bertujuan untuk mencari tahu apakah janin cenderung memiliki kelainan atau cacat janin tertentu.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Pakai Bantal Hamil',
                                'desc'  => 'Pertimbangkan untuk menggunakan bantal hamil yang nyaman untuk mengurangi nyeri di bagian perut bawah.'
                            ],
                            [
                                'title' => 'Jaga Kesehatan',
                                'desc'  => 'Menjaga kebersihan diri dengan rajin cuci tangan agar tak mudah sakit.'
                            ],
                            [
                                'title' => 'Mengatasi Masalah Pencernaan',
                                'desc'  => 'Konsumsi makanan yang banyak serat dan air untuk mencegah sembelit.'
                            ],
                            [
                                'title' => 'Pilih Baju Yang Nyaman',
                                'desc'  => 'Membeli pakaian dan perlengkapan ibu hamil agar tubuh lebih nyaman karena perut akan terus tumbuh.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Kelelahan',
                                'desc'  => 'Di usia kehamilan sepuluh minggu, Bunda akan merasakan tanda-tanda kehamilan seperti mual, kelelahan, ngidam hingga mulas.'
                            ],
                            [
                                'title' => 'Sakit kepala',
                                'desc'  => 'Sebagian ibu hamil mengeluhkan sakit kepala sepanjang hari. Cobalah meredakannya dengan melakukan teknik relaksasi seperti yoga dan pijat. Penting juga untuk menghindari stres.'
                            ],
                            [
                                'title' => 'Ngidam',
                                'desc'  => 'Untuk mengatasi ngidam, Bunda bisa mencari kegiatan menyehatkan sebagai upaya pengalihan, seperti jalan-jalan di sekitar rumah.'
                            ],
                            [
                                'title' => 'Perubahan Emosi',
                                'desc'  => 'Emosi tidak dapat diprediksi karena fluktuasi hormon.'
                            ],
                        ],
                    ],

                    11 => [
                        'title' => 'Perkembangan Janin Minggu Ke-11',
                        'image' => 'img/Minggu-11.png',
                        'size' => 'Buah Plum',
                        'weight' => '7 gr',
                        'height' => '4 cm',
                        'contents' => [
                            '<p>
                                Di usia kehamilan 11 minggu, bayi masih terus tumbuh dan berkembang di dalam rahim Bunda. Kini, janin sudah bisa menelan dan menendang. Semua organ sudah terbentuk sempurna.
                            </p>',
                            '<p>
                                Detail kecil juga sudah mulai muncul, seperti kuku dan rambut. Organ kelamin luar mulai muncul dan dalam beberapa minggu akan berkembang cukup jelas sehingga mudah dikenali.
                            </p>',
                            '<p> 
                              Janin mulai menghirup dan menghembuskan sejumlah kecil cairan ketuban. Cara ini dilakukan untuk membantu paru-paru bayi untuk tumbuh dan berkembang. Ukuran kepala bayi juga masih lebih besar dari anggota tubuh lainnya.
                             <p>',
                            '<p> 
                               Pada perkembangan janin minggu ke-11, organ-organnya mulai matang. Bayi juga sudah mulai menghirup dan menghembuskan air ketuban. Ukurannya sudah naik sebesar jeruk nipis dengan berat sekitar 7 gram.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Melakukan Skrining Kehamilan',
                                'desc'  => 'Melakukan skrining trimester pertama untuk memutuskan tes yang diperlukan.'
                            ],
                            [
                                'title' => 'Mencatat Berbagai Keluhan dan Pertanyan Seputar Kehamilan',
                                'desc'  => 'Menulis daftar pertanyaan untuk kunjungan prenatal berikutnya ke dokter.'
                            ],
                            [
                                'title' => 'Menjaga Kebersihan',
                                'desc'  => 'Menjaga kebersihan dengan rutin cuci tangan.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Pakai Pelembab',
                                'desc'  => 'Menggunakan pelembab pada perut, pinggul, dan paha untuk mencegah kulit kering dan gatal.'
                            ],
                            [
                                'title' => 'Hindari Panas',
                                'desc'  => 'Panas dapat memicu pusing dan gatal. Bunda juga sebaiknya menghindari mandi air hangat atau berada di ruangan dengan suhu panas.'
                            ],
                            [
                                'title' => 'Memilih Perawatan Yang Aman',
                                'desc'  => 'Melakukan perawatan rambut, wajah, dan tubuh yang aman bagi ibu hamil.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Mual',
                                'desc'  => 'Pada minggu ini Bunda masih akan merasakan mual dan muntah. Selain itu juga biasanya masih akan merasakan heartburn dan kelelahan.'
                            ],
                            [
                                'title' => 'Sering Buang Air Kecil',
                                'desc'  => 'Perkembangan janin akan menekan kantung kemih yang membuat keinginan buang air kecil jadi meningkat. Solusinya, hindari minum banyak menjelang tidur.'
                            ],
                            [
                                'title' => 'Sakit Kepala',
                                'desc'  => 'Untuk mengatasi sakit kepala, Bunda sebaiknya tidak tidur dengan posisi terlentang. Beberapa dokter menyarankan untuk tidur miring di sisi kiri, agar janin mendapatkan suplai darah dan makanan yang lebih baik.'
                            ],
                        ],
                    ],

                    12 => [
                        'title' => 'Perkembangan Janin Minggu Ke-12',
                        'image' => 'img/Minggu-12.png',
                        'size' => 'Buah Kiwi',
                        'weight' => '13 gr',
                        'height' => '5,4 cm',
                        'contents' => [
                            '<p>
                                Di usia kehamilan 12 minggu, janin terbentuk sempurna. Ia memiliki semua bagian tubuhnya dari calon gigi sampai kuku jari kaki. Otot-ototnya juga sudah mulai berkembang.
                            </p>',
                            '<p>
                                Di minggu ini, Bunda akan merasakan si kecil menendang-nendang. Jari tangan dan kakinya sudah terpisah, dan sebagian tulangnya mulai mengeras.  
                            </p>',
                            '<p> 
                              Tulang, termasuk kerangka dan tengkorak sudah tumbuh dan mengeras. Plasenta sudah berfungsi dengan sempurna, dan mengambil alih produksi hormon untuk mempertahankan kehamilan.
                             <p>',
                            '<p> 
                               Organ hati bayi juga sudah memproduksi sel darah merah. Di minggu kedua belas ini, pita suara bayi terbentuk.
                             <p>',
                            '<p> 
                               Pada perkembangan janin minggu ke-12, otot-ototnya sudah mulai berkembang. Di akhir trimester 1 ini, bayi sudah mulai menendang. Ukurannya naik seberat 13 gram atau sebesar buah plum.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Kunjungi Dokter',
                                'desc'  => 'Minggu ini kandungan Bunda menginjak 12 minggu atau 3 bulan. Segera konsultasi ke dokter kandungan untuk mengecek perkembangan janin.'
                            ],
                            [
                                'title' => 'Mengonsumsi Makanan Sehat',
                                'desc'  => 'Mengonsumsi makan atau camilan sehat yang bernutrisi tinggi. Hindari makanan laut mentah seperti sushi.'
                            ],
                            [
                                'title' => 'Tetap Konsumsi Vitamin Prenatal',
                                'desc'  => 'Konsumsi vitamin prenatal untuk membantu perkembangan janin dan mencegah kecacatan.'
                            ],
                            [
                                'title' => 'Selalu Terhidrasi',
                                'desc'  => 'Jaga asupan air minum 10-12 gelas per hari. Tidak hanya minum air putih, Bunda bisa mencukupi kebutuhan air dari buah dan minuman lainnya.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Melakukan Peregangan',
                                'desc'  => 'Melakukan peregangan sebelum beraktivitas untuk mencegah tubuh terasa pegal-pegal setelahnya.'
                            ],
                            [
                                'title' => 'Hindari Aktivitas Berat',
                                'desc'  => 'Hindari latihan yang mengharuskan tubuh berbaring terlentang, seperti sit up atau pilates.'
                            ],
                            [
                                'title' => 'Dapatkan Vaksin Tambahan',
                                'desc'  => 'Konsultasikan pada dokter apakah perlu melakukan tindakan vaksin flu.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Mual',
                                'desc'  => 'Pada minggu ini, Bunda masih akan merasakan mual dan muntah. Redakan gejala morning sickness tersebut dengan makanan dalam porsi sedikit tapi sering, istirahat cukup, dan hindari bau menyengat.'
                            ],
                            [
                                'title' => 'Perut Kembung',
                                'desc'  => 'Hormon progesteron menyebabkan jaringan otot polos di saluran cerna menjadi rileks, sehingga menyebabkan perut kembung. Atasi dengan memilih makanan berserat tinggi.'
                            ],
                            [
                                'title' => 'Kelelahan',
                                'desc'  => 'Atasi kelelahan dengan istirahat cukup, olahraga ringan, dan membuat prioritas pekerjaan.'
                            ],
                        ],
                    ],

                ],
            ],


            'Trimester 2' => [
                'range' => 'Minggu 13-24',
                'weeks' => [
                    13 => [
                        'title' => 'Perkembangan Janin Minggu Ke-13',
                        'image' => 'img/Minggu-13.png',
                        'size' => 'Buah Peach',
                        'weight' => '22 gr',
                        'height' => '7,3 cm',
                        'contents' => [
                            '<p>
                                Di usia kehamilan 13 minggu, wajah bayi sudah mulai terbentuk dengan sempurna. Jaringan dan organ yang sudah terbentuk dalam tubuh janin akan tumbuh pesat dan mengalami pematangan.
                            </p>',
                            '<p>
                                Pada akhir trimester pertama ini, folikel rambut janin juga mulai berkembang. Dari USG, kandung kemih dan ginjal yang memproduksi urine sudah bisa terlihat.
                            </p>',
                            '<p> 
                              Plasenta sudah berfungsi penuh dan akan terus tumbuh di sepanjang kehamilan. Di minggu ini, semua organ dan sistem penting tubuh bayi telah terbentuk.
                             <p>',
                            '<p> 
                               Janin sudah mendapatkan sebagian besar refleks dan siap bergerak jika Bunda menekan perut.
                             <p>',
                            '<p> 
                               Pada perkembangan janin minggu ke-13, wajahnya sudah terbentuk sempurna. Sementara itu, folikel rambut juga mulai berkembang. Semua organ dan sistem penting sudah terbentuk. Ukurannya sebesar buah lemon.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Tidur dalam Posisi Miring',
                                'desc'  => 'Mulai tidur dengan posisi miring. Tidur miring kiri membantu untuk memastikan aliran darah dan nutrisi maksimum ke plasenta dan meningkatkan fungsi ginjal.'
                            ],
                            [
                                'title' => 'Melanjutkan Minum Vitamin Prenatal',
                                'desc'  => 'Vitamin prenatal bermanfaat untuk melengkapi asupan nutrisi ibu dan bayinya.'
                            ],
                            [
                                'title' => 'Mengonsumsi Makanan Sehat',
                                'desc'  => 'Konsumsi makanan tinggi kalsium, magnesium, dan vitamin D untuk kesehatan tulang dan gigi bayi.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Memperhatikan Porsi Makanan yang Dikonsumsi',
                                'desc'  => 'Kontrol kadar gula darah selama hamil untuk mencegah cacat janin dan masalah kehamilan lainnya. Jaga berat badan supaya tidak obesitas.'
                            ],
                            [
                                'title' => 'Mencegah Strech Mark',
                                'desc'  => 'Menggunakan lotion atau cream yang aman untuk mengatasi stretch mark.'
                            ],
                            [
                                'title' => 'Hindari Beberapa Makanan',
                                'desc'  => 'Jauhi makanan pedas atau mentah seperti sushi.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Mual',
                                'desc'  => 'Pada minggu ke-13 kehamilan, Bunda masih akan merasakan mulas, konstipasi, dan ngidam. Tapi sudah semakin jauh berkurang dan berangsur-asur menghilang.'
                            ],
                            [
                                'title' => 'Peningkatan Energi',
                                'desc'  => 'Ibu hamil akan merasakan kenaikan energi atau jadi lebih bersemangat.'
                            ],
                            [
                                'title' => 'Peningkatan Libido',
                                'desc'  => 'Di awal trimester 2 ini, Bunda juga mengalami peningkatan untuk berhubungan seksual.'
                            ],
                        ],
                    ],

                    14 => [
                        'title' => 'Perkembangan Janin Minggu Ke-14',
                        'image' => 'img/Minggu-14.png',
                        'size' => 'Buah Pear',
                        'weight' => '43 gr',
                        'height' => '8,6 cm',
                        'contents' => [
                            '<p>
                                Di usia kehamilan 14 minggu, wajah bayi sudah menunjukkan ekspresi. Melalui pemeriksaan USG, bisa melihat bayi membuat kerutan di kening dan menyipitkan mata.
                            </p>',
                            '<p>
                                Pada minggu ini, terjadi peningkatan aktivitas melalui gerakan di dalam rahim. Banyak juga hal yang terjadi pada organ tubuh si kecil, misalnya atap mulut yang sudah terbentuk.
                            </p>',
                            '<p> 
                              Jika Bunda mengandung anak laki-laki, maka prostat sudah terbentuk di minggu ini. Begitu pun anak perempuan, di mana indung telur (ovaries) bergerak ke arah panggul. 
                             <p>',
                            '<p> 
                               Pada perkembangan janin minggu ke-14, wajahnya sudah bisa menunjukkan ekspresi dengan ukuran sebesar buah persik seberat 43 gram. Atap mulut terbentuk, begitu pula dengan prostat atau indung telurnya.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Konsumsi Makanan Bergizi',
                                'desc'  => 'Keseimbangan vitamin, mineral, dan nutrisi yang tepat harus diperhatikan selama kehamilan. Pilih makanan yang kaya akan folat untuk perkembangan sistem saraf bayi.'
                            ],
                            [
                                'title' => 'Olahraga Ringan',
                                'desc'  => 'Rutin melakukan olahraga ringan minimal 30 menit per hari.'
                            ],
                            [
                                'title' => 'Konsumsi Vitamin Prenatal',
                                'desc'  => 'Vitamin prenatal bermanfaat untuk melengkapi asupan nutrisi ibu dan bayinya.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Buat Janji dengan Dokter Kulit',
                                'desc'  => 'Kontrol ke dokter kulit untuk konsultasi beberapa perubahan tubuh, seperti munculnya tahi lalat.'
                            ],
                            [
                                'title' => 'Buat Janji dengan Dokter Gigi',
                                'desc'  => 'Kontrol ke dokter gigi untuk memeriksakan masalah gigi, gusi, dan mulut. Sebagian ibu hamil mengalamii sakit gigi dan gusi bengkak akibat perubahan hormon.'
                            ],
                            [
                                'title' => 'Mencari Informasi Mengenai Kelas Kehamilan dan Persalinan',
                                'desc'  => 'Ajak suami mencari dan mendaftar kelas kehamilan dan persiapan kehamilan.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Nafsu Makan Meningkat',
                                'desc'  => 'Memasuki 14 minggu kehamilan, nafsu makan Bunda mengalami peningkatan.'
                            ],
                            [
                                'title' => 'Pilek',
                                'desc'  => 'Sebagian ibu hamil akan mengalami pilek dan hidung tersumbat di trimester dua.'
                            ],
                            [
                                'title' => 'Nyeri',
                                'desc'  => 'Bunda mungkin akan mulai mengalami nyeri otot, ligamen, dan punggung bawah.'
                            ],
                        ],
                    ],

                    15 => [
                        'title' => 'Perkembangan Janin Minggu Ke-15',
                        'image' => 'img/Minggu-15.png',
                        'size' => 'Buah Alpukat',
                        'weight' => '114 gr',
                        'height' => '11 cm',
                        'contents' => [
                            '<p>
                                Pada usia kehamilan 15 minggu, perkembangan janin sudah sangat pesat. Ukuran janin akan lebih besar setiap minggunya.
                            </p>',
                            '<p>
                                Janin memang masih berukuran kecil di usia 15 minggu. Tapi, kerangka mereka mulai berkembang. Rambut, kulit, bahkan alis juga sudah mulai tumbuh.
                            </p>',
                            '<p> 
                              Janin sudah mulai menggeliat dan menggerakkan bagian tubuh. Jadi, Bunda akan segera merasakan pergerakan kecilnya.
                             <p>',
                            '<p> 
                               Kulitnya yang setipis perkamen dilapisi dengan lanugo (rambut yang sangat halus biasanya menghilang sebelum lahir). Alis mata bayi sudah mulai tumbuh dan rambut di ujung kepalanya mulai muncul.
                             <p>',
                            '<p> 
                               Pada perkembangan janin minggu ke-15, rambut, kulit, hingga alis sudah mulai tumbuh. Bayi juga sudah bis amenggeliat dan menggerakan tubuh. Beratnya mencapai 114 gram atau seukuran jeruk atau apel.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Mengonsumsi Makanan Sehat',
                                'desc'  => 'Mengonsumsi makanan yang bernutrisi tinggi. Salah satunya yang banyak mengandung zat besi untuk mendukung suplai darah yang sehat.'
                            ],
                            [
                                'title' => 'Mencukupi Kebutuhan Kalori',
                                'desc'  => 'Menambah asupan kalori sebanyak 300 kkal per hari. Menurut Angka Kecukupan Gizi tahun 2013, di trimester kedua kehamilan butuh 300 kkal/hari. Bisa didapatkan dari bubur kacang hijau atau telur rebus.'
                            ],
                            [
                                'title' => 'Menambah Berat Badan',
                                'desc'  => 'Cara menghitung berat badan ideal pada ibu hamil, yaitu jika BMI ibu sebelum hamil < 19,8 kg maka penambahan berat badan yang baik selama hamil adalah 12,5-18 kg.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Melakukan Tes Tambahan',
                                'desc'  => 'Lakukan tes skrining genetik untuk melihat apakah ada risiko bayi mengalami kelainan kromosom.'
                            ],
                            [
                                'title' => 'Tidur dengan Posisi Miring',
                                'desc'  => 'Tidur miring kiri membantu untuk memastikan aliran darah dan nutrisi maksimum ke plasenta, serta meningkatkan fungsi ginjal. Hindari tidur dengan posisi terlentang dan tengkurap.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Nafsu Makan Bertambah',
                                'desc'  => 'Selera makan dan energi Bunda mulai kembali ketika lima belas minggu kehamilan.'
                            ],
                            [
                                'title' => 'Kembung',
                                'desc'  => 'Hormon dalam tubuh akan naik turun atau berfluktuasi. Hal ini dapat menyebabkan perut kembung sama seperti periode menstruasi.'
                            ],
                            [
                                'title' => 'Sakit Kepala',
                                'desc'  => 'Sakit kepala juga mungkin terjadi karena perubahan hormon ketika hamil. Lakukan latihan relaksasi untuk meringankan rasa sakit.'
                            ],
                        ],
                    ],

                    16 => [
                        'title' => 'Perkembangan Janin Minggu Ke-16',
                        'image' => 'img/Minggu-16.png',
                        'size' => 'Buah Jeruk',
                        'weight' => '144 gr',
                        'height' => '12,4 cm',
                        'contents' => [
                            '<p>
                                Di usia 16 minggu kehamilan, Bunda sudah mulai bisa merasakan pergerakan janin setiap hari. Kepala janin juga mulai terbentuk mendekati normal.
                            </p>',
                            '<p>
                                Mata dan telinga janin telah terbentuk dan menetap permanen. Kepala janin sudah tidak condong ke depan seperti beberapa bulan pertama.
                            </p>',
                            '<p> 
                              Kaki janin juga berkembang dengan cepat. Tungkai bayi sudah tumbuh lebih panjang dari lengan sekarang, kuku jari tangan sudah terbentuk sempurna, dan semua sendi dan anggota badan bisa bergerak.
                             <p>',
                            '<p> 
                               Kalau Bunda hamil anak perempuan, ribuan sel telur janin mulai terbentuk lho.
                             <p>',
                            '<p> 
                               Pada perkembangan janin minggu ke-16, Bunda sudah bisa merasakan pergerakannya setiap hari. Mata dan telinga sudah terbentuk permanen. Janin sudah sebesar buah alpukat dengan berat 144 gram.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Konsumsi Makanan Sehat',
                                'desc'  => 'Konsumsi makanan yang kaya nutrisi, termasuk kalsium dan protein. Bunda wajib memasukkan sayuran dan buah dalam menu harian.'
                            ],
                            [
                                'title' => 'Olahraga Ringan',
                                'desc'  => 'Lakukan olahraga rutin, setidaknya 30 menit per hari. Misalnya, berenang, yoga dan jalan kaki.'
                            ],
                            [
                                'title' => 'Waktunya Kontrol ke Dokter',
                                'desc'  => 'Periksa ke dokter dan tanyakan tentang skrining untuk mengetahui kondisi janin.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Menggunakan Pelembab Udara',
                                'desc'  => 'Gunakan humidifier untuk melembapkan udara supaya hidung tidak kering. Pastikan udara di kamar tidur tidak terlalu panas atau dingin.'
                            ],
                            [
                                'title' => 'Konsumsi Sayuran Hijau',
                                'desc'  => 'Cobalah rutin untuk makan sayuran hijau. Misalnya, bayam yang kaya asam folat dan brokoli dengan kandungan zat besi tinggi, yang membantu pembentukan sel darah merah pada bayi selama trimester pertama.'
                            ],
                            [
                                'title' => 'Hunting Perlengkapan Bayi',
                                'desc'  => 'Mulai mencari perlengkapan bayi, seperti stroler dan tempat tidur.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Sembelit',
                                'desc'  => 'Sembelit ketika hamil bisa disebabkan oleh tingginya kadar progesteron.'
                            ],
                            [
                                'title' => 'Heartburn',
                                'desc'  => 'Ketika Bunda mengalami hurtburn, dada terasa panas dan seperti terbakar.'
                            ],
                            [
                                'title' => 'Mudah Lapar',
                                'desc'  => 'Pada minggu ini, nafsu Bunda akan meningkat sehingga mudah lapar. Triknya, makan dalam porsi sedikit tapi sering.'
                            ],
                        ],
                    ],

                    17 => [
                        'title' => 'Perkembangan Janin Minggu Ke-17',
                        'image' => 'img/Minggu-17.png',
                        'size' => 'Buah Pomegranate',
                        'weight' => '179 gr',
                        'height' => '13,5 cm',
                        'contents' => [
                            '<p>
                                Memasuki usia kehamilan 17 minggu, lemak tubuh janin mulai terbentuk. Jantungnya juga sudah diatur oleh otak.
                            </p>',
                            '<p>
                                Detak jantung janin sekitar 140 sampai 150 per menit. Sekitar dua kali lebih cepat dari detak jantung Bunda.
                            </p>',
                            '<p> 
                              Janin mulai mengasah keterampilan mengisap dan menelan. Ini sebagai persiapan ketika nanti ia lahir.
                             <p>',
                            '<p> 
                               Pada perkembangan janin minggu ke-17, keterampilan mengisap dan menelannya mulai terasah. Beratnya sudah mencapai 179 gram atau sebesar buah delima. Detak jantung berdetak sekitar 140-150 per menit.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Konsumsi Banyak Kalsium',
                                'desc'  => 'Ibu hamil butuh lebih dari 1200 hingga 1400 miligram kalsium per hari. Kalau asupan kalsium kurang, bukan tidak mungkin tulang ibu akan melepas kalsium untuk dialirkan ke bayinya.'
                            ],
                            [
                                'title' => 'Olahraga Ringan',
                                'desc'  => 'Lanjutkan olahraga prenatal secara rutin seperti yoga, berenang, dan jalan.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Cari Kelas Prenatal',
                                'desc'  => 'Kelas persiapan persalinan akan membantu Bunda dan Ayah mempelajari cara merawat bayi.'
                            ],
                            [
                                'title' => 'Pakai Produk yang Aman Untuk Ibu Hamil',
                                'desc'  => 'Gunakan tabir surya yang aman untuk ibu hamil.'
                            ],
                            [
                                'title' => 'Bicara Intim dengan Suami',
                                'desc'  => 'Bicara dari hati ke hati dengan suami mengenai perubahan mood. Ini akan membantu mengurangi stres dan ketegangan sepanjang kehamilan.'
                            ],
                            [
                                'title' => 'Pakai Humidifier',
                                'desc'  => 'Alat pelembab udara dapat membantu meringankan hidung terumbat pada ibu hamil.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Nyeri Pinggul dan Panggul',
                                'desc'  => 'Pertumbuhan rahim, peregangan otot, serta perubahan hormon dapat mempengaruhi otot dan ligamen ibu hamil. Akibatnya, Bunda merasakan nyeri punggung dan panggul.'
                            ],
                            [
                                'title' => 'Hidung Tersumbat',
                                'desc'  => 'peningkatan volume darah dan hormon dapat menyebabkan peningkatan produksi lendir di hidung.'
                            ],
                        ],
                    ],

                    18 => [
                        'title' => 'Perkembangan Janin Minggu Ke-18',
                        'image' => 'img/Minggu-18.png',
                        'size' => 'Buah Jeruk Bali',
                        'weight' => '140 - 180 gr',
                        'height' => '14 cm',
                        'contents' => [
                            '<p>
                                Pada usia kehamilan 18 minggu, janin sudah bisa menguap dan cegukan. Janin juga mulai mengatur jam tidur mereka.
                            </p>',
                            '<p>
                                Pada minggu ini, sistem reproduksi janin masih berkembang. Di usia kehamilan 18 minggu, dokter sudah bisa memprediksi jenis kelamin janin ketika USG dengan tingkat akurasi yang tinggi.
                            </p>',
                            '<p> 
                              Tulang rawan kenyal yang akan menjadi rangka tubuh bayi mulai mengeras menjadi tulang. Selubung mielin untuk melindungi serabut saraf mulai terbentuk. 
                             <p>',
                            '<p> 
                               Pada perkembangan janin minggu ke-18, sudah bisa menguap bahkan cegukan. Bunda sudah bisa melihat jenis kelaminnya saat USG. Beratnya mencapai 140-180 gram atau sebesar buah mentimun.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Hindari Berdiri Terlalu Lama',
                                'desc'  => 'Saat Bunda berdiri terlalu lama bisa menyebabkan kaki bengkak dan nyeri punggung.'
                            ],
                            [
                                'title' => 'Tidur dengan Posisi Menyamping',
                                'desc'  => 'Tidur miring kiri membantu untuk memastikan aliran darah dan nutrisi maksimum ke plasenta. Serta meningkatkan fungsi ginjal. Hindari tidur dengan posisi terlentang dan tengkurap.'
                            ],
                            [
                                'title' => 'Jaga Asupan Air',
                                'desc'  => 'Minum banyak air agar tidak dehidrasi dan sembelit. Selain itu, air putih juga berfungsi untuk mengantarkan nutrisi ke janin.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Ikut Kelas Prenatal',
                                'desc'  => 'Mengikuti kelas prenatal atau persiapan melahirkan, bisa membantu Bunda mempelajari tips merawat bayi.'
                            ],
                            [
                                'title' => 'Melakukan Perawatan',
                                'desc'  => 'Melakukan perawatan kecantikan agar relaks. Tapi ingat, hindari bahan-bahan kimia ketika perawatan di salon.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Tekanan Darah Rendah',
                                'desc'  => 'Beberapa wanita mengalami tekanan darah rendah di pertengahan kehamilan. Ketika tekanan darah menurun, Bunda bisa saja mengalami lemas, pusing, bahkan pingsan.'
                            ],
                            [
                                'title' => 'Pusing',
                                'desc'  => 'peningkatan volume darah dan hormon dapat menyebabkan peningkatan produksi lendir di hidung.Bunda perlu konsumsi makanan kecil sepanjang hari. Selain itu, hindari bangun dengan cepat dari posisi duduk atau tidur.'
                            ],
                        ],
                    ],

                    19 => [
                        'title' => 'Perkembangan Janin Minggu Ke-19',
                        'image' => 'img/Minggu-19.png',
                        'size' => 'Buah Jeruk Mangga',
                        'weight' => '230 gr',
                        'height' => '15 cm',
                        'contents' => [
                            '<p>
                                Pada minggu ke-19 kehamilan, panca indra janin mulai bekerja. Sel-sel saraf indra perasa, pendengaran, penglihatan, dan penciuman mulai berkembang di otak janin.
                            </p>',
                            '<p>
                                Ketika USG, organ-organ tubuh bayi mulai bisa ditandai. Mulai dari otak, tulang belakang, dan jantung untuk memastikan semuanya berkembang dengan baik. Gerakan janin seperti menedang, menekuk, meraih, berguling, atau bahkan mengisap ibu jarinya juga bisa dilihat melalui USG.
                            </p>',
                            '<p> 
                              Nah, kalau Bunda ingin tahu jenis kelamin bayi, ini waktu yang tepat untuk USG dan screening trimester dua.
                             <p>',
                            '<p> 
                               Pada perkembangan janin minggu ke-19, sudah sebesar buah mangga atau sekitar 230 gram. Pada minggu ini, sel saraf indra perasa, pendengaran, penglihatan, dan penciuman mulai berkembang di otak janin.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Konsumsi Makanan Bergizi',
                                'desc'  => 'Konsumsi makanan yang kaya akan kalsium, fosfor, vitamin D, A, dan C. Hindari minuman yang mengandung gula dan soda.'
                            ],
                            [
                                'title' => 'Kurangi Stres',
                                'desc'  => 'Stres berlebih pada ibu hamil dapat berpengaruh ke janin. Menurut penelitian yang diterbitkan dalam jurnal Early Human Development, disebutkan bahwa ibu hamil yang sering stres 40 persen lebih mungkin memiliki bayi dengan gangguan pola tidur.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Menjaga Pola Makan',
                                'desc'  => 'Jangan makan berlebihan. Untuk mengatasi nafsu makan yang meningkat, sebaiknya siasati dengan mengonsumsi makanan ringan yang sehat sepanjang hari.'
                            ],
                            [
                                'title' => 'Kurangi Paparan Sinar Matahari',
                                'desc'  => 'Menghindari panas dapat membantu Bunda terhindar dari pusing, dehidrasi, dan kelelahan.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Nyeri',
                                'desc'  => 'Seiring berkembangnya janin, punggung Bunda mungkin akan terasa nyeri. Selain punggung, nyeri juga terasa pada ligamen.'
                            ],
                            [
                                'title' => 'Mudah Lupa',
                                'desc'  => 'Memasuki usia kehamilan 19 minggu, beberapa wanita sering lupa. Beberapa ibu hamil mengatakan, memiliki masalah memori dan kesulitan berkonsentrasi.'
                            ],
                        ],
                    ],

                    20 => [
                        'title' => 'Perkembangan Janin Minggu Ke-20',
                        'image' => 'img/Minggu-20.png',
                        'size' => 'Buah Blewah',
                        'weight' => '280 gr',
                        'height' => '16,5 cm',
                        'contents' => [
                            '<p>
                                Pada usia kehamilan 20 minggu, rambut halus di kepala janin mulai tumbuh. Alis janin juga sudah terbentuk.
                            </p>',
                            '<p>
                                Otak janin berkembang dengan cepat di minggu ke-20 kehamilan. Sumsum tulang juga mulai memproduksi sel darah merah. Sedangkan ginjalnya terus menghasilkan air seni.
                            </p>',
                            '<p> 
                              Meski janin semakin besar di minggu ini, si kecil masih bebas bergerak dan berputar. Rambutmua di kulit kepalanya juga sudah mulai muncul.
                             <p>',
                            '<p> 
                               Jenis kelamin bayi mulai bisa dikenali ketika memasuki trimester kedua. Jadi, ini waktu yang tepat kalau Bunda ingin tahu jenis kelamin bayi melalui USG.
                             <p>',
                            '<p> 
                               Pada perkembangan janin minggu ke-20, rambut halus di kepala janin mulai tumbuh. Sedangkan otaknya juga berkembang dengan cepat. Beratnya mencapai 280 gram atau setara dengan buah pisang besar.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Lakukan USG',
                                'desc'  => 'Pada minggu ke-20, sudah waktunya mengunjungi dokter kembali. Tanyakan perkembangan janin setelah melakukan USG.'
                            ],
                            [
                                'title' => 'Menjaga Postur Tubuh',
                                'desc'  => 'Perhatian posisi tubuh untuk mencegah nyeri punggung. Hindari memutar badan, atau membungkuk saat duduk maupun berdiri. Jangan duduk dengan satu posisi dalam waktu lama. Cobalah rentangkan punggung sesekali untuk menghilangkan nyeri.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Konsultasikan Mengenai Tes Tambahan',
                                'desc'  => 'Menanyakan kepada dokter tentang pengujian genetik untuk melihat risiko kelainan pada janin.'
                            ],
                            [
                                'title' => 'Pakai Baju Ibu Hamil',
                                'desc'  => 'Kenakan pakaian khusus ibu hamil yang didesain lebih longgar di bagian perut dan payudara, sehingga membuat tubuh jadi lebih nyaman. Termasuk mulai memakai bra untuk ibu hamil.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Pegal',
                                'desc'  => 'Pegal pada ibu hamil biasanya karena ligamen atau jaringan penyokong dalam tubuh meregang, yang secara alami mengakomodasi pertumbuhan janin di dalam rahim.'
                            ],
                            [
                                'title' => 'Muncul Stretch Mark',
                                'desc'  => 'Kulit yang meregang akibat kehamilan dapat menyebabkan garis-garis stretch mark. Cobalah gunakan krim atau produk yang aman untuk mencegah stretch mark.'
                            ],
                        ],
                    ],

                    21 => [
                        'title' => 'Perkembangan Janin Minggu Ke-21',
                        'image' => 'img/Minggu-21.png',
                        'size' => 'Buah Terong',
                        'weight' => '398 gr',
                        'height' => '25,9 cm',
                        'contents' => [
                            '<p>
                               Pada usia kehamilan 21 minggu, tangan dan kaki janin sudah proporsional. Gerakannya sekarang jauh lebih terkoordinasi.
                            </p>',
                            '<p>
                                Hati dan limpa janin sudah mulai memproduksi sel darah. Begitu pula dengan sumsum tulang.
                            </p>',
                            '<p> 
                              Janin menelan sedikit cairan ketuban. Bukan hanya untuk nutrisi dan hidrasi, janin berlatih menelan dan mencerna.
                             <p>',
                            '<p> 
                               Berat badan bayi bertambah dan kini tubuhnya menjadi licin. Sedangkan vernix melapisi tubuh janin untuk melindungi kulitnya dari perendaman yang lama dalam cairan amnion.
                             <p>',
                            '<p> 
                               Pada perkembangan janin minggu ke-21, tangan dan kaki janin sudah proporsional lho. Di saat bersamaan, ia juga berlatih menelan dan mencerna sedikit cairan ketuban. Beratnya sudah mencapai 398 gram atau sama dengan wortel.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Hindari Perawatan Kecantikan Berbahaya',
                                'desc'  => 'Hindari perawatan kecantikan yang menggunakan laser.'
                            ],
                            [
                                'title' => 'Rutin Olahraga',
                                'desc'  => 'Pilih olahraga yang berisiko rendah, seperti yoga dan jalan kaki selama 30 menit per hari.'
                            ],
                            [
                                'title' => 'Jaga Asupan Makanan dan Minuman',
                                'desc'  => 'Minum air 10-12 gelas per hari. Selain itu, konsumsi makanan yang kaya zat besi.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Jaga Timbangan',
                                'desc'  => 'Perhatikan kenaikan berat badan. Konsumsi makanan sehat yang berkalori.'
                            ],
                            [
                                'title' => 'Periksa Gula Darah',
                                'desc'  => 'Tentukan jadwal pemeriksaan gula darah. Peningkatan gula darah selama kehamilan dapat mengakibatkan risiko kelainan jantung pada bayi.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Nyeri Punggung',
                                'desc'  => 'Hindari mengangkat berat. Jangan lupa olahraga ringan untuk peregangan.'
                            ],
                            [
                                'title' => 'Hidung Tersumbat',
                                'desc'  => 'Mengatasi hidung tersumbat saat hamil, Bunda harus cukup istirahat, diimbangi dengan minum air putih lebih banyak. Serta, berkumur dengan air garam hangat jika mengalami sakit tenggorokan atau batuk.'
                            ],
                            [
                                'title' => 'Varises',
                                'desc'  => 'Sebagian ibu hamil mulai merasakan tanda-tanda munculnya varises. Hal ini terjadi saat pembuluh darah terlihat menonjol dari kulit. Varises dapat menyebabkan sakit dan kram pada kaki.'
                            ],
                        ],
                    ],

                    22 => [
                        'title' => 'Perkembangan Janin Minggu Ke-22',
                        'image' => 'img/Minggu-22.png',
                        'size' => 'Terong',
                        'weight' => '450 gr',
                        'height' => '28 cm',
                        'contents' => [
                            '<p>
                              Minggu ini, janin mengembangkan indra sentuhannya. Janin juga belajar meraih telinga, hidung dan tali pusarnya.
                            </p>',
                            '<p>
                                Selain itu, janin juga mulai bisa merasakan cahaya dan gelap jauh lebih baik dari sebelumnya. Bahkan meski matanya masih tertutup.
                            </p>',
                            '<p> 
                              Janin dapat mendengar suara Bunda, detak jantung, dan suara perut ibunya. Ia juga mendengar semua suara yang ada di sekitar Bunda. Jadi, hati-hati ketika berbicara karena si kecil sudah bisa mendengarnya.
                             <p>',
                            '<p> 
                              Pada perkembangan janin minggu ke-22, mulai menajamkan indra penglihatan, pendengaran, hingga peraba. Selain itu, janin juga mulai bisa merasakan cahaya dan gelap jauh lebih baik dari sebelumnya. Beratnya mencapai 450 gram atau seukuran paprika.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Lanjutkan Minum Vitamin Prenatal',
                                'desc'  => 'Vitamin prenatal membantu perkembangan otak janin.'
                            ],
                            [
                                'title' => 'Pelajari Tentang Kontraksi',
                                'desc'  => 'Pelajari tentang perbedaan braxton hicks dengan kontraksi persalinan.'
                            ],
                            [
                                'title' => 'Pilih Camilan yang Tepat',
                                'desc'  => 'Pilih camilan dan makanan yang memenuhi kebutuhan kalsium ibu hamil.'
                            ],
                            [
                                'title' => 'Ikut Kelas Prenatal',
                                'desc'  => 'Mencari kelas prenatal untuk mempelajari cara mengurus bayi baru lahir.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Belajar teknik relaksasi dan pernapasan',
                                'desc'  => 'Ini akan mengurangi sesak napas saat mengalami heartburn. Teknik relaksasi dan pernapasan yang tepat, akan sangat membantu Bunda melalui proses persalinan.'
                            ],
                            [
                                'title' => 'Cukupi kebutuhan sayuran',
                                'desc'  => 'Makan sayuran hijau, seperti brokoli, pokcoy, dan kailan.'
                            ],
                            [
                                'title' => 'Pakai alas kaki yang tepat',
                                'desc'  => 'Mencari sepatu atau sandal yang nyaman.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Kontraksi',
                                'desc'  => 'Bunda mungkin akan merasakan kontraksi rahim atau disebut braxton hicks. Ini sering juga disebut sebagai latihan kontraksi. Sebagian orang juga menyebutnya sebagai kontraksi palsu.'
                            ],
                        ],
                    ],

                    23 => [
                        'title' => 'Perkembangan Janin Minggu Ke-23',
                        'image' => 'img/Minggu-23.png',
                        'size' => 'Terong',
                        'weight' => '540 gr',
                        'height' => '28 cm',
                        'contents' => [
                            '<p>
                              Pada minggu ke-23 kehamilan, kulit janin akan mulai kendur. Sekarang, kulitnya sudah mulai berwarna merah karena ada pembuluh darah dan arteri yang berkembang.
                            </p>',
                            '<p>
                                Bibir janin menjadi lebih jelas dan matanya sudah terbentuk. Tanda-tanda awal tumbuhnya gigi mulai muncul di antara barisan gusinya.
                            </p>',
                            '<p> 
                              Janin mulai lebih banyak menggerakkan tangan dan kakinya untuk memukul serta menendang. Tangan dan kakinya bahkan sering muncul di perut Bunda ketika ia menendang.
                             <p>',
                            '<p> 
                              Beberapa minggu lalu Bunda mendengar detak jantung janin melalui doppler. Nah, di minggu ke-23 kehamilan, Bunda bisa mendengar detak jantung janin menggunakan stetoskop lho.
                             <p>',
                            '<p> 
                              Pada perkembangan janin minggu ke-23, mulai lebih banyak menggerakkan tangan dan kakinya. Tangan dan kakinya bahkan sering muncul di perut Bunda ketika ia menendang. Beratnya mencapai 425 gram atau seukuran jeruk bali.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Mencukupi Kebutuhan Air',
                                'desc'  => 'Mencukupi kebutuhan minum air 10-12 gelas agar terhindar dari dehidrasi. Bisa didapat dari buah dan makanan lain yang mengandung air.'
                            ],
                            [
                                'title' => 'Tidur Malam Cukup',
                                'desc'  => 'Kurang tidur berpengaruh pada ingatan ibu hamil yang jadi pelupa. Selain itu, begadang juga bisa membuat pertahanan tubuh dan otak melemah.'
                            ],
                            [
                                'title' => 'Cukupi Kebutuhan Asupan Kalsium',
                                'desc'  => 'Bunda bisa memenuhi kebutuhan kalsium dari vitamin prenatal, susu, yoghurt, keju, atau sayuran yang berwarna hijau gelap.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Olahraga Pilates',
                                'desc'  => 'Bermanfaat untuk memperkuat dan meregangkan otot inti dalam menahan beban bayi, melatih tubuh untuk mempersiapkan persalinan dan pemulihan setelahnya, mengurangi rasa sakit selama kehamilan, melancarkan pernapasan, menjaga berat badan ideal.'
                            ],
                            [
                                'title' => 'Berjemur di Tempat Terbuka',
                                'desc'  => 'Ini akan membantu ibu hamil mendapatkan tambahan vitamin D dari sinar matahari pagi, untuk mencukupi kebutuhan kalsium ibu hamil.'
                            ],
                            [
                                'title' => 'Konsultasi dengan Dokter Kalau Ada Keluhan Pada Mata',
                                'desc'  => 'Melonjaknya hormon kehamilan menyebabkan retensi cairan mengubah kornea menjadi lebih tebal, bersamaan dengan peningkatan tekanan cairan di dalam bola mata yang membuat pandangan jadi kabur.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Pelupa',
                                'desc'  => 'Ibu hamil akan menjadi lebih mudah lupa akibat pregnancy brain.'
                            ],
                            [
                                'title' => 'Braxton Hicks',
                                'desc'  => 'Pada kehamilan 23 minggu, ibu hamil akan mulai merasakan Braxton Hicks atau kontraksi palsu.'
                            ],
                            [
                                'title' => 'Suhu Tubuh Naik',
                                'desc'  => 'Bunda lebih mudah gerah dan merasa udara di sekitar lebih panas dari biasanya.'
                            ],
                        ],
                    ],

                    24 => [
                        'title' => 'Perkembangan Janin Minggu Ke-24',
                        'image' => 'img/Minggu-23.png',
                        'size' => 'Pepaya',
                        'weight' => '665 gr',
                        'height' => '30,4 cm',
                        'contents' => [
                            '<p>
                              Pada minggu ke-24 kehamilan, janin beratnya semakin bertambah. Sebagian besar berasal dari lemak dan pertumbuhan otot, organ, serta tulang.
                            </p>',
                            '<p>
                               Pendengarannya juga berkembang dengan cepat. Jadi, kalau janin sering diperdengarkan musik tertentu, ia bisa mengenalinya.
                            </p>',
                            '<p> 
                              Alis dan bulu mata janin memang sudah tumbuh. Tapi, semuanya masih berwarna putih karena ia belum mengembangkan pigmennya.
                             <p>',
                            '<p> 
                             Pembuluh darah dalam paru-parunya mulai berkembang untuk menyiapkan pernapasan dan dia menelan cairan amnion secara teratur.
                             <p>',
                            '<p> 
                             Pada perkembangan janin minggu ke-24, pendengarannya berkembang dengan cepat. Jika sering diperdengarkan musik tertentu, janin pun bisa mengenalinya. Ukuran janin sudah sebesar buah blewah dengan beratnya 665 gram.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Saatnya Kontrol ke Dokter Kandungan',
                                'desc'  => 'Memasuki minggu ke-24 atau hamil 6 bulan, ayo kontrol ke dokter, Bunda. Konsultasi dengan dokter mengenai gejala kehamilan yang dialami.'
                            ],
                            [
                                'title' => 'Senam Kegel',
                                'desc'  => 'Senam kegel membantu menguatkan otot yang mendukung kandung kemih, rahim, dan usus. Memperkuat otot-otot ini selama kehamilan dapat memperlancar proses persalinan.'
                            ],
                            [
                                'title' => 'Periksa Kadar Gula',
                                'desc'  => 'Periksa kadar gula darah untuk menghindari diabetes gestasional.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Hindari Beberapa Makanans',
                                'desc'  => 'Konsumsi banyak protein dan hindari makanan yang pedas, gorengan, dan berlemak.'
                            ],
                            [
                                'title' => 'Makan dalam Porsi Kecil',
                                'desc'  => 'Menginjak kehamilan 24 minggu, Bunda akan mulai merasa lebih sering lapar. Cobalah makan 6 kali sehari tapi dalam porsi yang sedikit.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Masalah Pencernaan',
                                'desc'  => 'Bunda mungkin akan mengalami sembelit, karena hormon kehamilan yang membuat otot usus menjadi relaks. Sehingga, makanan dicerna lebih lama agar tubuh Bunda dan janin mendapat lebih banyak nutrisi.'
                            ],
                            [
                                'title' => 'Heartburn',
                                'desc'  => 'Heartburn juga disebabkan oleh sistem pencernaan yang melambat. Ditambah janin yang semakin besar menekan perut. Akibatnya, makanan ada di perut lebih lama dan mudah naik ke esofagus.'
                            ],
                        ],
                    ],
                ],
            ],


            'Trimester 3' => [
                'range' => 'Minggu 25-38',
                'weeks' => [
                    25 => [
                        'title' => 'Perkembangan Janin Minggu Ke-25',
                        'image' => 'img/Minggu-25.png',
                        'size' => 'Pepaya',
                        'weight' => '778 gr',
                        'height' => '31,8 cm',
                        'contents' => [
                            '<p>
                             Pada kehamilan minggu ke-25, janin mengembangkan indra penciumannya. Sekarang, ia bisa mencium bau dan aroma cairan ketuban.
                            </p>',
                            '<p>
                               Di minggu ini, tahap kedua perkembangan paru-paru janin telah selesai. Tahap kedua ini dinamakan kanalikuli.
                            </p>',
                            '<p> 
                                Cabang paru-paru, rongga kecil dan kapiler telah terbentuk. Masih ada dua tahap perkembangan paru-paru lagi yang masih harus ia lewati.F
                             <p>',
                            '<p> 
                                Pembuluh darah dalam paru-parunya mulai berkembang untuk menyiapkan pernapasan dan dia menelan cairan amnion secara teratur.
                             <p>',
                            '<p> 
                                Kulitnya tipis dan rapuh, tetapi tubuhnya berisi dan memenuhi lebih banyak ruang dalam rahim. Janin juga mulai menyimpan lapisan `lemak coklat` di dada, leher, dan selangkangan yang akan membantu mempertahankan panas tubuh. 
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Mencukupi Kebutuhan Air Minum',
                                'desc'  => 'Pastikan Bunda minum 10-12 gelas per hari agar tidak dehidrasi. Tidak harus air putih, Bunda bisa memenuhi asupan cairan dari buah juga.'
                            ],
                            [
                                'title' => 'Konsumsi Vitamin dan Makanan Bergizi',
                                'desc'  => 'Masukkan makanan yang tinggi kandungan zat besi, kalsium, protein, asam folat, lemak, zink, dan serat dalam menu harian.'
                            ],
                            [
                                'title' => 'Olahraga',
                                'desc'  => 'Lanjutkan berolahraga dan senam kegel untuk membantu menguatkan otot yang mendukung kandung kemih, rahim, dan usus. Memperkuat otot-otot ini selama kehamilan dapat memperlancar proses persalinan.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Selektif Pilih Camilan',
                                'desc'  => 'Pilih makanan manis yang lebih bergizi, sehingga tidak meningkatkan risiko obesitas maupun diabetes gestasional.'
                            ],
                            [
                                'title' => 'Mencari Nama Bayi',
                                'desc'  => 'Ajak Ayah untuk mulai memilih nama bayi yang cocok untuk si kecil.'
                            ],
                            [
                                'title' => 'Cari Tahu Tentang Depresi Pasca Melahirkan',
                                'desc'  => 'Kenali tanda-tanda baby blues atau depresi pasca melahirkan agar Bunda bisa segera mencari bantuan jika merasakan salah satunya.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Detak Jantung Lebih Kencang',
                                'desc'  => 'Ini karena selama hamil, jantung Bunda memompa darah 50 persen lebih banyak dibanding sebelumnya.'
                            ],
                            [
                                'title' => 'Pelupa',
                                'desc'  => 'Bunda akan mengalami pregnancy brain yang membuat jadi lebih mudah lupa atau linglung.'
                            ],
                        ],
                    ],

                    26 => [
                        'title' => 'Perkembangan Janin Minggu Ke-26',
                        'image' => 'img/Minggu-26.png',
                        'size' => 'Buah Pepaya',
                        'weight' => '907 gr',
                        'height' => '35,5 cm',
                        'contents' => [
                            '<p>
                             Mata janin yang tertutup selama berbulan-bulan, akan mulai terbuka di usia kehamilan 26 minggu. Itu berarti janin sudah dapat melihat di sekitarnya.
                            </p>',
                            '<p>
                               Bagian mata yang berwarna atau disebut iris belum memiliki banyak pigmentasi. Mata janin akan terisi pigmentasinya selama satu atau dua bulan ke depan.
                            </p>',
                            '<p> 
                               Jadi, di usia kehamilan 26 minggu, Bunda belum bisa tahu warna mata janin. Bahkan, terkadang setelah lahir pun warna matanya mungkin berubah.
                             <p>',
                            '<p> 
                                Janin juga akan mulai melakukan gerakan pernapasan, walaupun belum ada udara dalam paru-parunya.
                             <p>',
                            '<p> 
                               Pada perkembangan janin minggu ke-26, mata yang tertutup selama berbulan-bulan sudah mulai terbuka. Tapi belum memiliki warna, Bunda. Ukurannya sendiri mencapai 907 gram atau setara zucchini besar.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Penuhi Asupan Cairan',
                                'desc'  => 'Pastikan Bunda minum 10-12 gelas per hari agar tidak dehidrasi. Tidak harus air putih, Bunda bisa memenuhi asupan cairan dari buah juga.'
                            ],
                            [
                                'title' => 'Lanjutkan Minum Vitamin Prenatal',
                                'desc'  => 'Vitamin prenatal akan membantu memenuhi kebutuhan kalsium, asam folat, zat besi hingga mencegah terjadinya kecacatan pada janin.'
                            ],
                            [
                                'title' => 'Hindari Makanan Mentah',
                                'desc'  => 'Makan daging yang benar-benar matang. Hindari konsumsi telur mentah.'
                            ],
                            [
                                'title' => 'Mulai Membuat Rencana Persalinan',
                                'desc'  => 'Memasuki trimester tiga, saatnya mencari tahu dan membuat catatan rencana persalinan.',
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Latihan Kegel Setiap Hari',
                                'desc'  => 'Senam kegel secara rutin bisa membantu memperlancar persalinan Bunda.'
                            ],
                            [
                                'title' => 'Duduk dan Berdiri dengan Posisi yang Benar',
                                'desc'  => 'Hal ini bertujuan untuk mencegah sakit punggung hingga kaki bengkak.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Sulit Tidur',
                                'desc'  => 'Beberapa ibu hamil mengalami sulit tidur di trimester tiga. Sulit tidur terjadi karena gejala kehamilan yang terus meningkat dan perut yang semakin besar.'
                            ],
                            [
                                'title' => 'Kram Kaki',
                                'desc'  => 'Kram kaki terjadi karena kontraksi otot yang tidak disengaja di belakang betis dan sering terjadi pada malam hari.'
                            ],
                        ],
                    ],

                    27 => [
                        'title' => 'Perkembangan Janin Minggu Ke-27',
                        'image' => 'img/Minggu-27.png',
                        'size' => 'Buah Pepaya',
                        'weight' => '910 gr',
                        'height' => '37 cm',
                        'contents' => [
                            '<p>
                             Pada usia ke-27 kehamilan, janin mulai mengenali suara Bunda dan Ayah. Tapi, suara yang didengar janin masih teredam karena adanya vernix yang menutupi telinga.
                            </p>',
                            '<p>
                               Jadi, ini merupakan waktu yang tepat untuk bernyanyi dan mengajaknya bicara. Bunda juga bisa memutarkan musik untuk si kecil yang masih ada di dalam perut.
                            </p>',
                            '<p> 
                               Janin juga bisa cegukan. Biasanya untuk merespons makanan pedas yang dikonsumsi Bunda. Kalau janin cegukan, mungkin terasa seperti kejang di perut Bunda. Tapi, ini tidak apa-apa, cegukan hanya satu sensasi yang dibutuhkan janin supaya lebih terbiasa.
                             <p>',
                            '<p> 
                                Pada perkembangan janin minggu ke-27, bayi mulai mengenali suara Bunda dan Ayah lho. Ini merupakan waktu yang tepat untuk bernyanyi dan mengajaknya bicara. Beratnya saat ini sudah mencapai 910 gram atau sebesar kol.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Minum Vitamin Prenatal',
                                'desc'  => 'Vitamin prenatal akan membantu memenuhi kebutuhan kalsium, asam folat, zat besi hingga mencegah terjadinya kecacatan pada janin.'
                            ],
                            [
                                'title' => 'Cukupi Kebutuhan Air',
                                'desc'  => 'Minum air sekitar 10-12 gelas per hari. Bisa didapatkan juga dari buah.'
                            ],
                            [
                                'title' => 'Olahraga Ringan',
                                'desc'  => 'Latihan kegel atau yoga secara rutin akan membantu memperlancar persalinan.'
                            ],
                            [
                                'title' => 'Menjaga Pola Makan',
                                'desc'  => 'Konsumsi makanan yang kaya serat dan magnesium.',
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Jangan Berdiri Terlalu Lama',
                                'desc'  => 'Berdiri terlalu lama bisa memicu kaki bengkak, dan meningkatkan risiko terkena varises.'
                            ],
                            [
                                'title' => 'Buat Rencana Persalinan',
                                'desc'  => 'Cari informasi mengenai proses persalinan yang aman, biaya persalinan, hingga IMD setelah bayi lahir.'
                            ],
                            [
                                'title' => 'Cek Kadar Gula Darah',
                                'desc'  => 'Periksa kadar gula darah untuk menghindari diabetes gestasional.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Wasir',
                                'desc'  => 'Peningkatan hormon progesteron menyebabkan makanan menuju usus bergerak lebih lambat. Sehingga, menyebabkan sembelit dan bisa berujung wasir.'
                            ],
                            [
                                'title' => 'Kaki Bengkak',
                                'desc'  => 'Meningkatnya cairan tubuh membuat kaki ibu hamil menjadi bengkak. Selain itu, hindari juga berdiri terlalu lama.'
                            ],
                        ],
                    ],

                    28 => [
                        'title' => 'Perkembangan Janin Minggu Ke-28',
                        'image' => 'img/Minggu-28.png',
                        'size' => 'Labu Orange',
                        'weight' => '1000 gr',
                        'height' => '38 cm',
                        'contents' => [
                            '<p>
                             Pada usia kehamilan 28 minggu, janin berada di posisi yang tepat mengarah ke jalur lahir. Janin sudah berlatih untuk mengedipkan mata.
                            </p>',
                            '<p>
                               Mengedipkan mata hanya salah satu keterampilan yang sudah janin kembangkan. Keterampilan lain yang sudah janin pelajari adalah batuk, mengisap, cegukan, dan pernapasan yang lebih baik.
                            </p>',
                            '<p> 
                               Bayi benar-benar tumbuh dan mengisi ruang yang kosong dalam rahim. Dia juga tidur dan bangun dalam interval yang teratur. Bahkan, sebagian ahli percaya bayi mulai bermimpi di minggu ke-28.
                             <p>',
                            '<p> 
                                Otaknya mulai aktif di minggu ini, alur khas mulai muncul di permukaann dan lebih banyak perkembangan jaringan otak. 
                             <p>',
                            '<p> 
                                Pada perkembangan janin minggu ke-28, sudah berlatih untuk mengedipkan mata dan berada di posisi yang tepat mengarah ke jalur lahir. Ukuran janin sebesar labu kabocha dengan berat 1 kilogram.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Minum Vitamin Prenatal',
                                'desc'  => 'Vitamin prenatal akan membantu memenuhi kebutuhan kalsium, asam folat, zat besi hingga mencegah terjadinya kecacatan pada janin.'
                            ],
                            [
                                'title' => 'Penuhi Asupan Cairan',
                                'desc'  => 'Penuhi asupan cairan dengan minum air 10-12 gelas per hari.'
                            ],
                            [
                                'title' => 'Jaga Pola Makan',
                                'desc'  => 'Konsumsi makanan kaya zat besi, seperti ayam, bayam, dan tahu.',
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Olahraga Rutin',
                                'desc'  => 'Lakukan senam Kegel untuk membantu melancarkan proses persalinan.'
                            ],
                            [
                                'title' => 'Mengikuti Kelas Prenatal',
                                'desc'  => 'Mengikuti kelas prenatal atau persiapan melahirkan dapat membantu mempelajari cara merawat bayi.'
                            ],
                            [
                                'title' => 'Mandi Air Hangat',
                                'desc'  => 'Mandi air hangat ketika panggul terasa linu.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Sakit Punggung',
                                'desc'  => 'Hormon kehamilan dan berat badan bisa menyebabkan sakit punggung.'
                            ],
                            [
                                'title' => 'Linu Panggul',
                                'desc'  => 'Linu panggul yang parah dapat menyebabkan rasa sakit di daerah selangkangan, Bunda.'
                            ],
                            [
                                'title' => 'Kram Kaki',
                                'desc'  => 'Kaki kram yang dirasakan selama kehamilan bisa disebabkan oleh kelelahan.'
                            ],
                        ],
                    ],

                    29 => [
                        'title' => 'Perkembangan Janin Minggu Ke-29',
                        'image' => 'img/Minggu-29.png',
                        'size' => 'Labu Orange',
                        'weight' => '1152 gr',
                        'height' => '38,6 cm',
                        'contents' => [
                            '<p>
                             Memasuki usia kehamilan 29 minggu, normalnya berat janin akan naik dua 2-3 kali lipat selama 11 minggu ke depan. Hal itu terjadi karena 
                             banyak lemak yang tersimpan di permukaan kulit. Pada minggu ini, kulit janin yang keriput pun akan semakin mulus.
                            </p>',
                            '<p>
                               Pada usia 29 minggu kehamilan, gerak janin pun akan semakin terbatas. Melansir Whattoexpect, ruang di rahim menjadi semakin sempit. Hal tersebut membuat Bunda bisa semakin merasakan sikutan dari lutut dan sikut janin nih.
                            </p>',
                            '<p> 
                               Pada minggu ini, janin akan lebih kuat dan bersemangat menanggapi semua rangsangan seperti gerakan, suara, cahaya, dan permen yang Bunda makan setengah jam lalu. Bunda sudah bisa mulai menghitung tendangan janin 2 kali sehari, untuk memastikan bayi baik-baik saja.
                             <p>',
                            '<p> 
                                Pada perkembangan janin minggu ke-29, kulit yang keriput akan semakin mulus dan gerakannya pun lebih terbatas karena ukurannya yang bertambah. Minggu ini janin berukuran seperti butternut besar dengan berat mencapai 1-1,3 kg.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Mencatat Keluhan Kehamilan untuk Ditanyakan ke Dokter',
                                'desc'  => 'Konsultasi ke dokter atas semua keluhan, termasuk di antaranya perut gatal dan perih akibat peregangan kulit'
                            ],
                            [
                                'title' => 'Cukupi Kebutuhan Air Minum',
                                'desc'  => 'Menjaga asupan minum 10-12 gelas sehari, untuk mengatasi berbagai keluhan kehamilan.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Olahraga Ringan',
                                'desc'  => 'Yoga prenatal atau jalan santai untuk mengatasi susah tidur, hingga persiapan melahirkan.'
                            ],
                            [
                                'title' => 'Menghitung Tendangan Janin',
                                'desc'  => 'Menghitung banyak tendangan janin dalam sehari, untuk memastikan gerakan dan keaktifannya. Ingat, janin harus menendang 10 kali dalam 1 jam.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Sakit Kepala',
                                'desc'  => 'Bunda akan merasakan sakit kepala baik yang bersifat ringan hingga mengganggu. Sakit kepala akan terasa makin parah jika kurang tidur, dan juga saat gula darah rendah.'
                            ],
                            [
                                'title' => 'Perut Gatal',
                                'desc'  => 'Kulit meregang lebih tipis sehingga membuatnya lebih sensitif. Atasi dengan lotion dan banyak minum air. Beritahu dokter kalau rasa gatal dan rumah makin memburuk.'
                            ],
                            [
                                'title' => 'Nyeri Punggung, Kaki, dan Pinggul',
                                'desc'  => 'Tubuh membawa beban ekstra sepanjang hari pada kehamilan 29 minggu. Rasa nyeri akan bergantung pada posisi bayi yang memberi tekanan pada apa saja.'
                            ],
                        ],
                    ],

                    30 => [
                        'title' => 'Perkembangan Janin Minggu Ke-30',
                        'image' => 'img/Minggu-30.png',
                        'size' => 'Labu Orange',
                        'weight' => '1300 gr',
                        'height' => '38,4 - 39,9 cm',
                        'contents' => [
                            '<p>
                             Pada usia kehamilan minggu ke-30, perut Bunda sudah semakin terlihat menonjol. Rambut bulu halus yang disebut lanugo akan mulai rontok. 
                             Sebelumnya lanugo menutupi tubuh bayi selama berminggu-minggu. Namun tidak rontok sepenuhnya, karena rambut ini masih tetap ada di beberapa bagian tubuh bayi saat lahir.
                            </p>',
                            '<p>
                              Paling sering, rambut halus ini tumbuh di wajah bayi di bagian cambang, punggung, dan bagian atas pantatnya. Sedangkan vernix, lapisan putih, berminyak, dan lembab akan menyelimuti kulit janin mulai dari ujung kepala sampai kaki depan dan belakang.
                            </p>',
                            '<p> 
                               Saat Bunda mengarahkan cahaya lambu ke perut, kemungkinan bayi akan merespons dengan memutar kepalanya. Namun, penglihatannya masih dalam proses perkembangan. Bunda bisa mencobanya dalam beberapa minggu kemudian jika janin belum merespons.
                             <p>',
                            '<p> 
                                Pada bayi laki-laki, buah zakarnya bergerak dari dekat ginjal menuju selangkangan. Sedangkan pada bayi perempuan klitorisnya menonjol karena labia masih kecil, belum bisa menutupinya.
                             <p>',
                            '<p> 
                                Pada perkembangan janin minggu ke-30, rambut bulu halus yang disebut lanugo akan mulai rontok. Saat Bunda mengarahkan cahaya lampu ke perut, kemungkinan bayi akan merespons dengan memutar kepalanya. Ukurannya berkisar 1,3 kg, Bun.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Jaga Pola Makan',
                                'desc'  => 'Hindari makanan pedas, berminyak, dan asam untuk menghindari maag kambuh. Terutama sebelum tidur, agar tidak menyebabkan terjaga semalaman.'
                            ],
                            [
                                'title' => 'Penuhi Asupan Air',
                                'desc'  => 'Minum cukup air agar tidak mengalami dehidrasi. Kekurangan cairan bisa memicu braxton hicks atau kontraksi palsu.'
                            ],
                            [
                                'title' => 'Melanjutkan Minum Vitamin Prenatal',
                                'desc'  => 'Lanjutkan mengonsumsi suplemen kehamilan yang telah diresepkan dokter, untuk membantu perkembangan otak janin.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Melakukan Tes Tambahan',
                                'desc'  => 'Melakukan tes non-stres (NST), untuk mengukur kontraksi dan detak jantung bayi.'
                            ],
                            [
                                'title' => 'Mulai Melakukan Persiapan Melahirkan',
                                'desc'  => 'Menyiapkan support system untuk mengasuh bayi setelah melahirkan. Mempersiapkan segala kebutuhan dan persyaratan rumah sakit.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Kelelahan',
                                'desc'  => 'Meski sangat lelah, Bunda biasanya susah tidur karena rasa tidak nyaman yang dirasakan beberapa bagian tubuh.'
                            ],
                            [
                                'title' => 'Carpal Tunnel Syncrom',
                                'desc'  => 'Sindrom carpal tunnel menimbulkan rasa sakit di bagian pergelangan tangan, yang dikaitkan dengan aktivitas berulang. Seperti mengetik atau menyupir setiap harinya.'
                            ],
                        ],
                    ],

                    31 => [
                        'title' => 'Perkembangan Janin Minggu Ke-31',
                        'image' => 'img/Minggu-31.png',
                        'size' => 'Labu Orange',
                        'weight' => '1490 - 1500 gr',
                        'height' => '41 cm',
                        'contents' => [
                            '<p>
                             Pada minggu ke-31 kehamilan, janin melalui perkembangan otak dan saraf besar. Mata janin juga berkembang dan iris bereaksi terhadap cahaya.
                            </p>',
                            '<p>
                              Pada USG dengan layanan 3D dan 4D, Bunda bisa melihat seluruh permukaan wajah bayi. Bunda juga bisa melihat bayi bergerak, berkedip, mengisap ibu jari, bahkan saat mereka tersenyum atau cemberut.
                            </p>',
                            '<p> 
                               Paru-paru dan saluran pencernaan bayi sudah hampir matang. Namun sayangnya indra penciuman bayi belum bekerja, sebab ia masih dalam rendaman cairan ketuban. Janin perlu menghirup udara untuk bisa mendeteksi aroma apapun.
                             <p>',
                            '<p> 
                                Pada minggu ini janin sudah bisa cegukan, menelan, bernapas, mengayuh dengan tangan dan kaki mereka di sepanjang dinding rahim. Bahkan, janin juga suka mengisap jempolnya.
                             <p>',
                            '<p> 
                                Pada perkembangan janin minggu ke-31, otak dan saraf besar terus mengalami kemajuan. Mata janin juga berkembang dan iris bereaksi pada cahaya. Janin juga bisa mengisap jari lho. Beratnya berkisar 1500 gram.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Olahraga Ringan',
                                'desc'  => 'Olahrga ringan untuk membantu melatih pernapasan yang akan menguntungkan Bunda saat proses persalinan.'
                            ],
                            [
                                'title' => 'Cukupi Asupan Air Minum',
                                'desc'  => 'Minum air putih 8-12 gelas sehari untuk menghindari kontraksi palsu.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Yoga Prenatal',
                                'desc'  => 'Lakukan Yoga Prenatal untuk Meredakan Sakit Punggung.'
                            ],
                            [
                                'title' => 'Mempelajari Tanda-tanda Persalinan',
                                'desc'  => 'Mempelajari tanda-tanda persalinan prematur, sebab di usia kehamilan 31 minggu Bunda mungkin akan mengalami braxton hicks.'
                            ],
                            [
                                'title' => 'Hindari Stress',
                                'desc'  => 'Menghindari stres agar tidak memperburuk pregnancy brain atau mudah lupa.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Sesak Napas',
                                'desc'  => 'Saat kehamilan tumbuh lebih besar akan membuat napas Bunda menjadi lebih berat dan pendek.'
                            ],
                            [
                                'title' => 'Kuku Kering dan Rapuh',
                                'desc'  => 'Bunda mengalami pertumbuhan kuku ekstra, tetap lebih kering dan mudah patah. Itu sebabnya dibutuhkan minyak pelembab untuk kutikula kuku.'
                            ],
                            [
                                'title' => 'Pelupa',
                                'desc'  => 'Pelupa merupakan bagian dari pregnancy brain, suatu kondisi yang merupakan penyusutan volume sel otak di trimester ketiga kehamilan.'
                            ],
                        ],
                    ],

                    32 => [
                        'title' => 'Perkembangan Janin Minggu Ke-32',
                        'image' => 'img/Minggu-32.png',
                        'size' => 'Buah Melon Hijau',
                        'weight' => '1800 - 2000 gr',
                        'height' => '40 - 42 cm',
                        'contents' => [
                            '<p>
                             Paru-paru janin terus berkembang, meskipun masih dibutuhkan beberapa minggu lagi untuk mencapai kematangan. Kuku kaki dan tangan terbentuk sepenuhnya minggu ini. Bulu mata dan alis juga tumbuh pada kehamilan 32 minggu.
                            </p>',
                            '<p>
                              Janin sedang bersiap-siap turun ke arah jalan lahir. Jika posisi kepala sudah di bawah, mungkin mereka akan merasa lebih sempit saat ini.
                            </p>',
                            '<p> 
                               Kemampuan janin untuk mengisap dan menelan semakin berkembang. Pada 32 minggu kehamilan, bayi akan berlatih mengisap dan menelan untuk mempersiapkan sistem pencernaan mereka saat minum susu.
                             <p>',
                            '<p> 
                                Di minggu ke-32 kehamilan, janin juga mulai berlatih bernapas dengan menghirup cairan ketuban. Lengan, tungkai, dan tubuh bayi terus terisi dan menjadi proporsional dengan kepalanya.
                             <p>',
                            '<p> 
                                Pada perkembangan janin minggu ke-32, paru-paru hampir matang. Sedangkan kaki dan yangan terbentuk sepenuhnya di minggu ini. Janin berlatih bernapas dengan menghirup cairan ketuban. Beratnya naik menjadi 1800 gram atau seukuran labu.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Menghitung Tendangan Bayi',
                                'desc'  => 'Hal ini penting untuk mengetahui kondisi bayi sehat dalam kandungan.'
                            ],
                            [
                                'title' => 'Menyiapkan Perlengkapan Bayi',
                                'desc'  => 'Mulai mengemas perlengkapan bayi dan persiapan melahirkan dalam tas khusus.'
                            ],
                            [
                                'title' => 'Kontrol ke Dokter',
                                'desc'  => 'Melakukan USG untuk memastikan kepala bayi sudah di bawah.'
                            ],
                            [
                                'title' => 'Mencari Tahu Mengenai Braxton Hicks',
                                'desc'  => 'Sebagian ibu hamil akan mulai merasakan braxton hicks atau kontraksi palsu yang jauh lebih kuat dari sebelumnya. Hal ini biasanya membuat Bunda kebingungan karena memang sudah mendekati waktu bersalin.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Melakukan Persiapan Melahirkan',
                                'desc'  => 'Menyiapkan segala keperluan melahirkan seperti misalnya kartu asuransi atau BPJS.'
                            ],
                            [
                                'title' => 'Melakukan Perawatan',
                                'desc'  => 'Mandi uap yang nyaman dan santai untuk membantu Bunda lebih rileks.'
                            ],
                            [
                                'title' => 'Makan Kurna',
                                'desc'  => 'Mengonsumsi kurma menurut penelitian akan membantu persalinan jadi lebih mudah. Bunda yang makan kurma jelang persalinan akan lebih mudah melewati persalinan dibandingkan yang tidak makan.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Sesak Napas',
                                'desc'  => 'Ini bukan masalah berat, karena sesak napas yang Bunda rasakan merupakan efek dari gerakan janin yang mendapat banyak udara.'
                            ],
                            [
                                'title' => 'Payudara Bocor',
                                'desc'  => 'Payudara mungkin akan terasa lebih besar, dan sudah memproduksi kolostrum, yaitu cairan kuning tebal yang akan dimakan bayi dalam beberapa hari pertama kehidupan. Jangan kaget ya, Bunda, kalau melihat rembesan ASI saat kehamilan baru 8 bulan.'
                            ],
                            [
                                'title' => 'Keputihan',
                                'desc'  => 'Akan ada peningkatan keputihan sebagai cara tubuh dalam mempersiapkan kelahiran, untuk mencegah infeksi di area vagina.'
                            ],
                        ],
                    ],

                    33 => [
                        'title' => 'Perkembangan Janin Minggu Ke-33',
                        'image' => 'img/Minggu-33.png',
                        'size' => 'Buah Melon Hijau',
                        'weight' => '2000 gr',
                        'height' => '40 - 43 cm',
                        'contents' => [
                            '<p>
                                Cairan ketuban sudah mencapai batas maksimal pada usia kehamilan 33 minggu. Itu sebabnya, tendangan dan gerakannya jauh lebih terasa pada akhir-akhir ini.
                            </p>',
                            '<p>
                                Pada minggu ini, penglihatan janin juga akan semakin berkembang. Janin sudah bertindak seperti bayi, di mana kemampuan membuka dan menutup mata sudah lebih bagus. Janin akan membuka mata saat bangun, dan menutup matanya saat tidur.
                            </p>',
                            '<p> 
                                Kondisi dinding rahim menjadi lebih tipis, akan membuat cahaya menembus rahim. Itu membantu bayi membedakan antara siang dan malam.
                             <p>',
                            '<p> 
                                Pada minggu ke-33 kehamilan, janin mencapai tonggak penting karena sudah punya sistem kekebalan sendiri. Antibodi disalurkan dari Bunda ke janin ketika mengembangkan sistem kekebalan tubuhnya. Ini akan sangat berguna saat ia lahir untuk menangkis segala jenis kuman.
                             <p>',
                            '<p> 
                                Pada bayi laki-laki, buah zakarnya mungkin sudah masuk dalam skrotum. Terkadang, salah satu atau kedua buah zakar belum masuk ke posisinya sampai setelah lahir.
                             <p>',
                            '<p> 
                                Pada perkembangan janin minggu ke-33, gerakan janin sudah jauh berkurang karena tingkat cairan ketuban mencapai jumlah maksimal. Penglihatan sudah berkembang jauh. Beratnya mungkin akan bertambah 200 gram dari minggu lalu atau seukuran nanas.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Mengonsumsi Makanan Tinggi Kandungan Asam Lemak Omega-3 (DHA)',
                                'desc'  => 'DHA banyak ditemukan dalam minyak ikan. Selain bagus untuk bayi, DHA juga bermanfaat untuk mencegah kelahiran prematur dan melindungi dari depresi persalinan.'
                            ],
                            [
                                'title' => 'Hitung Gerakan Janin',
                                'desc'  => 'Menghitung gerakan janin pada pagi dan sore. Periksa jam dan mulailah menghitung setiap gerakan, gulir, tendangan hingga 10 kali.'
                            ],
                            [
                                'title' => 'Jangan Berdiri Terlalu Lama',
                                'desc'  => 'Menghindari berdiri terlalu lama untuk mencegah varises.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Siapkan Camilan Sehat',
                                'desc'  => 'Memakan camilan atau jus untuk memancing gerakan janin.'
                            ],
                            [
                                'title' => 'Pilih Buah yang Mengandung Biotin',
                                'desc'  => 'Mengonsumsi banyak biotin, asupan nutrisi penting bagi ibu hamil dan janin yang banyak terkandung dalam alpukat, pisang, kacang-kacangan, dan biji-bijian utuh.'
                            ],
                            [
                                'title' => 'Mencari Informasi Tentang Menyusui',
                                'desc'  => 'Mencari informasi dengan membaca atau mengikuti kelas persiapan menyusui.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Susah Tidur',
                                'desc'  => 'Bunda akan lebih sering buang air kecil saat malam hari, kram kaki, mulas dengan perut sebesar bola bakset. Semua hal ini akan membuat Bunda jadi lebih sulit tidur.'
                            ],
                            [
                                'title' => 'Nyeri Ligamen',
                                'desc'  => 'Selama Bunda tidak mengalami demam, kedinginan, atau pendarahan tidak ada yang perlu dikhawatirkan.'
                            ],
                            [
                                'title' => 'Kuku Rapuh',
                                'desc'  => 'Hormon kehamilan akan membuat kuku tumbuh lebih cepat, tetapi jadi rapuh.'
                            ],
                        ],
                    ],

                    34 => [
                        'title' => 'Perkembangan Janin Minggu Ke-34',
                        'image' => 'img/Minggu-34.png',
                        'size' => 'Buah Melon Hijau',
                        'weight' => '2200 - 2400 gr',
                        'height' => '45 cm',
                        'contents' => [
                            '<p>
                                Pada minggu ke-34, perkembangan janin sudah mendekati sempurna. Sebagaian besar organ utama seperti pencernaan, pernapasan, dan sistem saraf sudah bisa bekerja sendiri. Dalam minggu ini, posisi kepala bayi juga sudah turun ke bawah atau biasa disebut posisi head-down.
                            </p>',
                            '<p>
                                Sedangkan ruangan rahim jadi lebih sempit, jadi sikut dan lutut bayi mulai sering terlihat menonjol di perut Bunda. Sama seperti minggu sebelumnya, bayi juga akan membuka mata saat bangun, dan menutup matanya ketika tertidur. Kemampuan tersebut akan membantu mereka menyesuaikan dengan jadwal tidur.
                            </p>',
                            '<p> 
                                Di samping itu, lapisan lilin yang licin pada kulit bayi (vernix) mulai menebal minggu ini. Lapisan vernix akan mulai menipis dalam beberapa minggu ke depan. Sedangkan pada janin laki-laki testis akan mulai turun di usia kehamilan 34 minggu.
                             <p>',
                            '<p> 
                                Tengkorak bayi masih cukup lentur dan belum sepenuhnya menyatu, untuk memudahkan melalui jalan lahir. Tapi tulang di bagian lainnya akan mulai mengeras, dan kulitnya semakin cerah.
                             <p>',
                            '<p> 
                                Pada perkembangan janin minggu ke-34, organ utama seperti pencernaan, pernapasan, dan sistem saraf sudah bisa bekerja sendiri. Posisi kepala bayi juga sudah turun ke bawah menuju jalan lahir. Ukurannya mencapai 2.400 gram atau seukuran melon.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Hindari Obat Tetes Mata',
                                'desc'  => 'Menghindari pemakaian kacamata hitam dan obat tetes mata, meskipun penglihatan menjadi buram.'
                            ],
                            [
                                'title' => 'Batasi Garam',
                                'desc'  => 'Menjaga asupan makan, terutama membantasi konsumsi garam. Batasi mengonsumsi acar.'
                            ],
                            [
                                'title' => 'Olahraga Ringan',
                                'desc'  => 'Jalan cepat atau yoga untuk membantu meningkatkan aliran darah dan endorfin yang lebih baik.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Pakai Celana Berbahan Katun',
                                'desc'  => 'Memakai celana dalam berbahan katun untuk mengatasi ketidaknyamanan akibat keputihan yang meningkat.'
                            ],
                            [
                                'title' => 'Senam Kegel',
                                'desc'  => 'Melakukan senam kegel untuk membantu meningkatkan sirkulasi ke area penyebab wasir dan sembelit.'
                            ],
                            [
                                'title' => 'Berendam Air Hangat',
                                'desc'  => 'Berendam air hangat untuk membuat tubuh lebih rileks, serta mengurangi nyeri punggung dan pembengkakan kaki.'
                            ],
                            [
                                'title' => 'Pijat Perineum',
                                'desc'  => 'Memulai pijat perineum dengan Ayah jika berencama melahirkan normal. Pijatan ini membantu meningkatkan plastisitas perineum, dan mengurangi robek perineum selama persalinan.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Penglihatan Kabur',
                                'desc'  => 'Pandangan Bunda akan sedikit lebih buram akhir-akhir ini. Penurunan produksi air mata dapat membuat mata kering dan teritasi, terutama jika memakai softlens.'
                            ],
                            [
                                'title' => 'Gas Berlebih',
                                'desc'  => 'Bunda juga akan merasakan gas berlebih di usia kehamilan 34 minggu. Kecemasan hanya akan membuat gas lebih buruk. Penumpukan gas terjadi karena Bunda cenderung menelan lebih banyak udara ketika stres.'
                            ],
                            [
                                'title' => 'Keputihan Meningkat',
                                'desc'  => 'Pada minggu ini, akan ada peningkatan keputihan yang lebih banyak dari sebelumnya. Hormon kehamilan, yaitu esterogen menyebabkan aliran darah ke daerah panggul meningkat dan merangsang selaput lendir.'
                            ],
                        ],
                    ],

                    35 => [
                        'title' => 'Perkembangan Janin Minggu Ke-35',
                        'image' => 'img/Minggu-35.png',
                        'size' => 'Buah Melon Hijau',
                        'weight' => '2400 - 2500 gr',
                        'height' => '46 cm',
                        'contents' => [
                            '<p>
                                Pendengaran bayi pada minggu ini sudah berkembang speenuhnya. Janin sudah bisa merespons baik terhadap suara-suara bernada tinggi. Pada janin anak laki-laki, mungkin minggu ini testis sudah sepenuhnya turun.
                            </p>',
                            '<p>
                                Perkembangan kekuatan otak bayi pun cukup mengejutkan. Sedangkan tengkorak yang melindunginya tetap lembut atau lunak, untuk memudahkannya melalui jalan lahir.
                            </p>',
                            '<p> 
                                Sedangkan ginjal dan hati sudah bekerja dengan baik. Begitu pula dengan pendengaran yang sudah berkembang sangat baik. Janin mungkin bereaksi pada suara Ayah, dan bunyi bernada tinggi di sekitar Bunda.
                             <p>',
                            '<p> 
                                Berat bayi bertambah dan membuat lapisan yang diperlukan untuk mengatur suhu tubuh. Paru-paru bayi sudah berkembang sempurna.
                             <p>',
                            '<p> 
                                Pada perkembangan janin minggu ke-35, Pendengarannya sudah berkembang sepenuhnya. Janin sudah bisa merespons baik terhadap suara-suara bernada tinggi. Beratnya sekitar 2.500 gram, naik sedikit dari minggu lalu.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Mempelajari Tanda-tanda melahirkan',
                                'desc'  => 'Mempelajari tanda-tanda melahirkan seperti air ketuban pecah, kontraksi yang menyakitkan, dan kontraksi yang teratur.'
                            ],
                            [
                                'title' => 'Hindari Panas',
                                'desc'  => 'Hindari ruangan terlalu panas dan pengap agar tak memicu sakit kepala.'
                            ],
                            [
                                'title' => 'Duduk Tegak',
                                'desc'  => 'Duduk tegak saat makan dan beberapa jam setelahnya, untuk menghindari mulas yang mengganggu.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Tes Tambahan',
                                'desc'  => 'Melakukan tes Streptokokus B Group untuk memeriksa apakah ada bakteri yang berbahaya saat bayi lahir.'
                            ],
                            [
                                'title' => 'Perbanyak Buah dan Sayur',
                                'desc'  => 'Perbanyak makan buah dan sayur atau suplemen yang mengandung vitamin C untuk mengatasi gusi berdarah.'
                            ],
                            [
                                'title' => 'Jaga Asupan Gula',
                                'desc'  => 'Jaga asupan gula untuk mencegah komplikasi berbahaya pada ibu hamil.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Nyeri di Pinggul dan Panggul',
                                'desc'  => 'Ligamen mengendur menjadi salah satu cara tubuh mempersiapkan kelahiran bayi. Efeknya, Bunda akan merasakan nyeri sekitar pinggul dan panggul.'
                            ],
                            [
                                'title' => 'Kontraksi Braxton Hicks',
                                'desc'  => 'Kontraksi palsu didefinisikan juga sebagai kontraksi intermiten. Umumnya tanpa rasa sakit dan terjadi setiap 10 hingga 20 menit setelah trimester pertama kehamilan.'
                            ],
                            [
                                'title' => 'Ruam Kulit',
                                'desc'  => 'Ibu hamil jangan panik ya jika mengalami gatal dan ruam pada perut. Ruam ini tidak akan membahayakan janin di dalam rahim.'
                            ],
                        ],
                    ],

                    36 => [
                        'title' => 'Perkembangan Janin Minggu Ke-36',
                        'image' => 'img/Minggu-36.png',
                        'size' => 'Buah Semangka',
                        'weight' => '2700 - 3100 gr',
                        'height' => '45 - 48 cm',
                        'contents' => [
                            '<p>
                                Pada minggu ini, janin sudah terlihat sempurna seperti bayi pada umumnya. Bahkan pendengarannya sudah lebih tajam dibanding sebelumnya. Janin bahkan sudah dapat mengenai suara dan lagu yang akan menjadi favoritnya setelah lahir.
                            </p>',
                            '<p>
                                Pada usia kehamilan masuk 36 minggu, tulang tengkorak bayi belum menyatu dengan kepala untuk mempermudah melalui jalan lahir. Tengkorak bayi bukan satu-satunya struktur lunak di tubuh mungilnya. Sebagian besar tulang beserta tulang rawannya juga cukup lunak, memungkinkan perjalanan yang lebih mudah ketika persalinan tiba.
                            </p>',
                            '<p> 
                                Sitem pencernaannya sudah cukup matang, sebagai tanda ia sudah siap untuk hidup di luar rahim ibunya. Sirkulasi darah juga sudah bekerja dan disempurnakan. Sama halnya dengan sistem kekebalan bayi yang cukup berkembang untuk melindungi bayi dari infeksi di luar rahim.
                             <p>',
                            '<p> 
                                Sedangkan rambut halus lanugo dan selaput putih vernix caseosa akan terus luruh pada minggu ini. Janin akan menelan rambut dan kulit tersebut. Setelah dicerna, keduanya masih akan ada di perutnya sebagai meconium, zat lengket hitam atau hijau tua. Di mana nantinya meconium ini akan menjadi kotoran pertamanya setelah lahir. 
                             <p>',
                            '<p> 
                                Pada perkembangan janin minggu ke-36, bentuknya sudah terlihat sempurna dan pendengaran lebih tajam. Posisi janin akan lebih rendah ke panggul. Beratnya mencapai 2.700 gram dengan panjang sekitar 45-48 cm.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Waktunya Kontrol ke Dokter',
                                'desc'  => 'Berdiksusi dengan dokter mengenai keputusan bersalin, apakah bisa dilalui secara normal atau harus caesar.'
                            ],
                            [
                                'title' => 'Latihan Kegel',
                                'desc'  => 'Latihan kegel untuk membantu bayi turun dan mempermudah persalinan.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Mempersiapkan Fisik Sebelum Persalinan',
                                'desc'  => 'Latihan panggul, mandi air hangat dan kompres hangat untuk meredakan nyeri panggul.'
                            ],
                            [
                                'title' => 'Melengkapi Persiapan Persalinan',
                                'desc'  => 'Menyiapkan semua keperluan melahirkan dalam 1 tas khusus.'
                            ],
                            [
                                'title' => 'Memakai Bra Menyusui',
                                'desc'  => 'Tidur memakai bra menyusui agar lebih nyaman, karena dirancang untuk menopang payudara yang membengkak.'
                            ],
                            [
                                'title' => 'Melakukan Pijatan yang Dibutuhkan',
                                'desc'  => 'Melakukan pijatan yang bisa membantu proses persalinan.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Nyeri Panggul',
                                'desc'  => 'Tambahan tekanan dari kepala bayi yang mulai membenam lebih dalam ke panggul, akan menimbulkan rasa nyeri.'
                            ],
                            [
                                'title' => 'Payudara Sakit',
                                'desc'  => 'Bunda tidak perlu panik jika merasakan payudara nyeri. Ini merupakan cara payudara mempersiapkan diri untuk menyusui bayi setelah kelahirannya.'
                            ],
                            [
                                'title' => 'Keputihan Semakin Banyak',
                                'desc'  => 'Pada minggu ini, serviks semakin memanjang dan mengandung ledir yang kental atau biasa kita sebut dengan keputihan nih, Bunda.'
                            ],
                        ],
                    ],

                    37 => [
                        'title' => 'Perkembangan Janin Minggu Ke-37',
                        'image' => 'img/Minggu-37.png',
                        'size' => 'Buah Semangka',
                        'weight' => '2900 - 3100 gr',
                        'height' => '46 - 48 cm',
                        'contents' => [
                            '<p>
                                Pada minggu ini, janin masih berlatih untuk kelahirannya. Ia juga masih menghirup dan menghembuskan air ketuban, mengerjap dari sisi ke sisi.
                            </p>',
                            '<p>
                                Selain itu, mengutip dari Whattoexpect, perkembangan ketangkasan jari-jari janin juga sudah lebih bagus dari sebelumnya. Sekarang ini, dia sudah dapat menggenggam benda yang lebih kecil seperti jari kaki atau hidungnya.
                            </p>',
                            '<p> 
                                Itu sebabnya, janin ketika dilihat dari ultrasound (USG) sering mengisap jempol. Itu dilakukannya sebagai persiapan menyusu setelah ia lahir nantinya.
                             <p>',
                            '<p> 
                                Paru-paru bayi juga sudah berkembang dengan matang. Seminggu sebelum waktu lahir, janin terus melakukan stimulasi pernapasan dengan menghirup dan mengeluarkan cairan ketuban, mengisap jempolnya, berkedip dan berputar dari sisi ke sisi.
                             <p>',
                            '<p> 
                                Pada perkembangan janin minggu ke-37, masih akan menghirup dan menghembuskan air ketuban. Jari-jari janin sudah bisa menggegam. Beratnya akan naik sekitar 2.900-3.100 gram dengan panjang 46-48 cm, atau seukuran semangka.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Kontrol ke Dokter Minggu Ini',
                                'desc'  => 'Jelang persalinan biasanya Bunda diminta untuk kontrol ke dokter setiap minggu.'
                            ],
                            [
                                'title' => 'Pijat Perineum',
                                'desc'  => 'Melakukan pijat perineum dibantu suami, untuk membantu meregangkan area antara vagina dan rektum. Hal ini untuk memudahkan bayi lahir.'
                            ],
                            [
                                'title' => 'Menjaga Cairan Tubuh Tercukupi',
                                'desc'  => 'Menjaga asupan minum sampai waktu persainan tiba.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Jangan Stres',
                                'desc'  => 'Menghindari stres agar tak mengganggu proses persalinan.'
                            ],
                            [
                                'title' => 'Berlatih Mengurus Bayi',
                                'desc'  => 'Berlatih mengurus bayi menggunakan perlengkapan yang sudah disiapkan untuk si kecil.'
                            ],
                            [
                                'title' => 'Melakukan Tes Tambahan yang Diperlukan',
                                'desc'  => 'Melakukan tes Streptokokus B Group untuk memeriksa apakah ada bakteri yang berbahaya saat bayi lahir.'
                            ],
                            [
                                'title' => 'Mencari Informasi Dokter Anak',
                                'desc'  => 'Mencari informasi dokter anak sesuai dengan kebutuhan, agar saat si kecil lahir pekan depan Bunda tidak bingung lagi.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'Nafsu Makan Meningkat',
                                'desc'  => 'Ibu yang hamil anak laki-laki biasanya akan mengalami peningkatan nafsu makan lebih besar. Itu nafsu makan lebih besar. Itu sebabnya perut jadi lebih sesak minggu ini.'
                            ],
                            [
                                'title' => 'Kurang Bisa Merasakan Tendangan Janin',
                                'desc'  => 'Bunda jadi tidak terlalu bisa merasakan tendangan janin akibat ruangan rahim yang sempit.'
                            ],
                            [
                                'title' => 'Pelebaran Serviks',
                                'desc'  => 'Pada minggu ke-37, ada serviks Bunda yang sudah mulai mengalami pelebaran. Di mana nantinya akan terbuka hingga 10 cm agar bayi dapat melewati jalan lahir.'
                            ],
                        ],
                    ],

                    38 => [
                        'title' => 'Perkembangan Janin Minggu Ke-38',
                        'image' => 'img/Minggu-38.png',
                        'size' => 'Buah Semangka',
                        'weight' => '3100 gr',
                        'height' => '50,7 cm',
                        'contents' => [
                            '<p>
                                Pada minggu ini mata bayi akan berwarna biru, abu-abu atau coklat. Tetapi saat perut Bunda terkena cahaya, mata janin dapat berubah warna atau teduh.
                            </p>',
                            '<p>
                                Lanugo atau rambut halus yang menutupi tubuh janin akan rontok di minggu ini. Pada saat yang sama, paru-paru bayi menguat dan pita suaranya telah berkembang sebagai bentuk bahwa ia siap berkomunikasi melalui tangisan, Bunda.
                            </p>',
                            '<p> 
                                Bayi masih menelan cairan ketuban, beberapa di antaranya berakhir di usus bersama dengan sel-sel lainnya, empedu, dan produk limbah yang akan menjadi gerakan usus pertama bagi janin.
                             <p>',
                            '<p> 
                                Melansir dari Whattoexpect, paru-paru sudah matang dan memproduksi lebih banyak surfaktan, suatu zat yang mencegah kantung udara di paru-paru saling menempel begitu ia mulai bernapas.
                             <p>',
                            '<p> 
                                Pada minggu ini, janin juga akan menambah lemak dan menyempurnakan otak serta sistem sarafnya. Di mana nantinya berguna untuk menghadapi sistem rangsangan begitu lahir ke dunia.
                             <p>',
                            '<p> 
                                Pada perkembangan janin minggu ke-38, lanugo akan rontok. Sedangkan pita suara bayi telah berkembang yang nantinya akan berkembang menjadi bentuk tangisan. Beratnya sekitar 3.100 gram dengan panjang 50,7 cm.
                             <p>',
                        ],

                        'mom_tips' => [
                            [
                                'title' => 'Menjaga Asupan Air Minum 8-12 Gelas Sehari',
                                'desc'  => 'Hal ini tetap penting dilakukan hingga proses bersalin tiba.'
                            ],
                            [
                                'title' => 'Kontrol ke Dokter',
                                'desc'  => 'Ini bisa menjadi kunjungan terakhir sebelum Bunda melahirkan. Tanyakan semua perlengkapan dan proses persalinan dengan matang serta terperinci.'
                            ],
                            [
                                'title' => 'Pijat Perineum',
                                'desc'  => 'Melakukan pijat perineum dibantu suami, untuk membantu meregangkan area antara vagina dan rektum. Hal ini untuk memudahkan bayi lahir.'
                            ],
                        ],

                        'mom_should' => [
                            [
                                'title' => 'Kurangi Makan',
                                'desc'  => 'Minum banyak air dan mengurangi makan.'
                            ],
                            [
                                'title' => 'Jaga Makanan',
                                'desc'  => 'Menghindari makanan berlemak atau yang mengandung serat tidak larut.'
                            ],
                            [
                                'title' => 'Tidak Berdiri Lama',
                                'desc'  => 'Tidak berdiri dalam waktu lama untuk mencegah pembengkakan kaki semakin parah.'
                            ],
                        ],

                        'mom_feel' => [
                            [
                                'title' => 'ASI bocor',
                                'desc'  => 'Bunda juga mungkin akan mengalami rembesan ASI pertama yang disebut kolostrum. Jika Bunda tidak nyaman bisa memakai breastpad untuk mengatasinya.'
                            ],
                            [
                                'title' => 'Muncul Bercak Darah dari Vagina',
                                'desc'  => 'Beberapa Bunda juga mungkin akan mengalami keputihan yang disertai dengan bercak darah merah muda dan coklat, sebagai tanda bahwa pembuluh di serviks pecah selama pelebaran dan penipisan.'
                            ],
                            [
                                'title' => 'Diare',
                                'desc'  => 'Bagi Bunda yang mengalami diare di minggu-minggu terakhir kehamilan, sudah bisa bersiap-siap melahirkan ya. Saat Bunda mengalami diare minggu ini, itu mungkin berarti persalinan sudah dekat.'
                            ],
                        ],
                    ],
                ],
            ],
        ];

        return view('user.pregnancy', compact('pregnancyData'));
    }
}
