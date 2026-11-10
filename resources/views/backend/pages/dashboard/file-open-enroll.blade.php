  <!-- Charts Container Grid -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        
        <!-- HBD File Open Stats Card -->
        <div x-data="statsChart('hbdChart', [50, 48, 56, 63, 50, 49, 21, 21, 15, 23, 13, 2], ['Nov \'01', 'Dec \'01', 'Jan \'01', 'Feb \'01', 'Mar \'01', 'Apr \'01', 'May \'01', 'Jun \'01', 'Jul \'01', 'Aug \'01', 'Sep \'01', 'Oct \'01'])" 
             class="rounded-2xl border border-neutral-100 bg-neutral-50/50 p-5 dark:border-neutral-800 dark:bg-neutral-900/50">
            
            <div class="flex items-center gap-2 mb-4">
                <h3 class="font-bold text-neutral-800 dark:text-neutral-100 text-base">HBD File Open Stats</h3>
            </div>

            <!-- Chart Canvas Wrapper -->
            <div class="relative h-64 w-full">
                <canvas x-ref="canvas"></canvas>
            </div>
        </div>

        <!-- HLA File Open Stats Card -->
        <div x-data="statsChart('hlaChart', [0, 0, 0, 1, 0, 0, 0, 0, 14, 7, 4, 0], ['Nov \'01', 'Dec \'01', 'Jan \'01', 'Feb \'01', 'Mar \'01', 'Apr \'01', 'May \'01', 'Jun \'01', 'Jul \'01', 'Aug \'01', 'Sep \'01', 'Oct \'01'])" 
             class="rounded-2xl border border-neutral-100 bg-neutral-50/50 p-5 dark:border-neutral-800 dark:bg-neutral-900/50">
            
            <div class="flex items-center gap-2 mb-4">
                <h3 class="font-bold text-neutral-800 dark:text-neutral-100 text-base">HLA File Open Stats</h3>
            </div>

            <!-- Chart Canvas Wrapper -->
            <div class="relative h-64 w-full">
                <canvas x-ref="canvas"></canvas>
            </div>
        </div>

    </div>

<!-- Chart.js and Alpine Component Initialization Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('statsChart', (chartId, initialData, labels) => ({
            selectedRange: '12m',
            chart: null,

            init() {
                const ctx = this.$refs.canvas.getContext('2d');
                this.chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: initialData,
                            backgroundColor: '#10b981',
                            hoverBackgroundColor: '#059669',
                            borderRadius: 8,
                            borderSkipped: false,
                            barThickness: 22,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: '#1e293b',
                                padding: 10,
                                borderRadius: 8,
                                displayColors: false
                            }
                        },
                        scales: {
                            x: {
                                grid: { display: false },
                                ticks: {
                                    font: { size: 10 },
                                    color: '#94a3b8'
                                }
                            },
                            y: {
                                border: { dash: [4, 4] },
                                grid: { color: '#f1f5f9' },
                                ticks: {
                                    font: { size: 10 },
                                    color: '#94a3b8',
                                    stepSize: 20
                                }
                            }
                        }
                    }
                });
            },

            applyFilter() {
                // Handle filter trigger/AJAX dynamic update logic here
                console.log('Filter applied:', this.selectedRange);
            }
        }));
    });
</script>