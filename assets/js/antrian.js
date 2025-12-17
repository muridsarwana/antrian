$(document).ready(function() {
    // State variables
    let X = 0; // Sekretariat state (0 = hidden, 1 = visible)
    let Y = 0; // Bidang state (0 = hidden, 1 = visible)
    
    // Elements
    const majorButtons = $('.major-buttons-stack');
    const panelSekretariat = $('#panelSekretariat');
    const panelBidang = $('#panelBidang');
    
    // Update time function
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', { 
            hour12: false,
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });
        $('#currentTime').text(timeString);
    }
    setInterval(updateTime, 1000);
    updateTime();

    // Function to update UI based on X and Y states
    function updateUI() {
        console.log(`X: ${X}, Y: ${Y}`);
        
        // Reset all positions first
        majorButtons.removeClass('slide-left slide-right');
        
        // Case 1: Both X=0, Y=0 - Center position, no containers
        if (X === 0 && Y === 0) {
            // Hide both containers with animation
            panelSekretariat.removeClass('panel-active').addClass('panel-inactive');
            panelBidang.removeClass('panel-active').addClass('panel-inactive');
            
            // Return major buttons to center
            majorButtons.removeClass('slide-left slide-right');
            
            // Remove inactive classes after animation
            setTimeout(() => {
                panelSekretariat.removeClass('panel-inactive');
                panelBidang.removeClass('panel-inactive');
            }, 600);
        }
        
        // Case 2: X=1, Y=0 - Sekretariat active
        else if (X === 1 && Y === 0) {
            // First, hide Bidang container if it was visible (slide out right)
            if (panelBidang.hasClass('panel-active')) {
                panelBidang.removeClass('panel-active').addClass('panel-inactive');
            }
            
            // Move major buttons to right
            majorButtons.removeClass('slide-left').addClass('slide-right');
            
            // Show Sekretariat container from left
            panelSekretariat.removeClass('panel-inactive').addClass('panel-active');
        }
        
        // Case 3: X=0, Y=1 - Bidang active  
        else if (X === 0 && Y === 1) {
            // First, hide Sekretariat container if it was visible (slide out left)
            if (panelSekretariat.hasClass('panel-active')) {
                panelSekretariat.removeClass('panel-active').addClass('panel-inactive');
            }
            
            // Move major buttons to left
            majorButtons.removeClass('slide-right').addClass('slide-left');
            
            // Show Bidang container from right
            panelBidang.removeClass('panel-inactive').addClass('panel-active');
        }
    }

    // Sekretariat Button Click Handler
    $('#sekretariatBtn').on('click', function() {
        // X = mod 2 of (X + 1), Y = 0
        X = (X + 1) % 2;
        Y = 0;
        updateUI();
    });

    // Bidang Button Click Handler
    $('#bidangBtn').on('click', function() {
        // Y = mod 2 of (Y + 1), X = 0
        Y = (Y + 1) % 2;
        X = 0;
        updateUI();
    });

    // Back Button Handlers
    $('.back-btn').on('click', function() {
        // Reset both states to 0
        X = 0;
        Y = 0;
        updateUI();
    });

    // Sub-button click handlers for queue generation
    $('.sub-btn').on('click', function() {
        const $btn = $(this);
        const department = $btn.data('dept');
        
        // Prevent multiple clicks
        if ($btn.hasClass('loading')) return;
        
        // Show loading state
        $btn.addClass('loading').prop('disabled', true);
        
        // Determine which PHP file to call based on department
        const departmentMap = {
            'umum': { insert: 'insert_1umum.php', get: 'get_antrian_1umum.php', print: 'UMUM' },
            'aset': { insert: 'insert_1aset.php', get: 'get_antrian_1aset.php', print: 'ASET' },
            'kepegawaian': { insert: 'insert_1kepegawaian.php', get: 'get_antrian_1kepegawaian.php', print: 'KEPEGAWAIAN' },
            'program': { insert: 'insert_1program.php', get: 'get_antrian_1program.php', print: 'PROGRAM' },
            'keuangan': { insert: 'insert_1keuangan.php', get: 'get_antrian_1keuangan.php', print: 'KEUANGAN' },
            'sma': { insert: 'insert_2sma.php', get: 'get_antrian_2sma.php', print: 'PEMBINAAN SMA' },
            'smk': { insert: 'insert_3smk.php', get: 'get_antrian_3smk.php', print: 'PEMBINAAN SMK' },
            'diksus': { insert: 'insert_4slb.php', get: 'get_antrian_4slb.php', print: 'PEMBINAAN DIKSUS' },
            'ketenagaan': { insert: 'insert_6ket.php', get: 'get_antrian_6ket.php', print: 'KETENAGAAN' },
            'kebudayaan': { insert: 'insert_5bud.php', get: 'get_antrian_5bud.php', print: 'PEMBINAAN KEBUDAYAAN' }
        };
        
        const deptConfig = departmentMap[department];
        
        if (!deptConfig) {
            alert('Konfigurasi departemen tidak ditemukan!');
            $btn.removeClass('loading').prop('disabled', false);
            return;
        }
        
        // Generate queue number
        $.ajax({
            type: 'POST',
            url: deptConfig.insert,
            success: function(result) {
                if (result === 'Sukses') {
                    // Get the updated queue number
                    $.get(deptConfig.get, function(queueNumber) {
                        // Print queue number
                        $.ajax({
                            type: 'GET',
                            url: 'print_antrian.php',
                            data: { 
                                x: deptConfig.print, 
                                y: queueNumber 
                            },
                            success: function() {
                                // Show success state
                                $btn.removeClass('loading').addClass('success');
                                setTimeout(() => {
                                    $btn.removeClass('success').prop('disabled', false);
                                }, 2000);
                                
                                console.log('Antrian berhasil dibuat:', deptConfig.print, queueNumber);
                            },
                            error: function() {
                                alert('Error saat print antrian!');
                                $btn.removeClass('loading').prop('disabled', false);
                            }
                        });
                    });
                } else {
                    alert('Gagal membuat antrian!');
                    $btn.removeClass('loading').prop('disabled', false);
                }
            },
            error: function() {
                alert('Error server!');
                $btn.removeClass('loading').prop('disabled', false);
            }
        });
    });

    // Auto-return to home after 60 seconds of inactivity
    let inactivityTimer;
    function resetInactivityTimer() {
        clearTimeout(inactivityTimer);
        inactivityTimer = setTimeout(() => {
            if (X !== 0 || Y !== 0) {
                X = 0;
                Y = 0;
                updateUI();
            }
        }, 60000);
    }

    $(document).on('click keypress scroll', resetInactivityTimer);
    resetInactivityTimer();
});