@extends('admin.layout')
@section('page-title', 'Overview')
@section('content')

<style>
.stats-row { display: grid; grid-template-columns: repeat(4,1fr); gap: 12px; margin-bottom: 18px; }
.sc { background: #fff; border: 1px solid #ebebeb; border-radius: 14px; padding: 18px 20px; position: relative; overflow: hidden; }
.sc-bar { position: absolute; top: 0; left: 0; right: 0; height: 3px; }
.sc-top { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 14px; }
.sc-icon { width: 36px; height: 36px; border-radius: 10px; display: flex; align-items: center; justify-content: center; }
.badge { font-size: 11px; font-weight: 500; padding: 3px 8px; border-radius: 99px; }
.badge.up { background: #e1f5ee; color: #0f6e56; }
.badge.dn { background: #fdecea; color: #b91c1c; }
.sc-val { font-size: 28px; font-weight: 700; color: #0f0f11; letter-spacing: -1px; line-height: 1; }
.sc-lbl { font-size: 11px; color: #a8a8b8; margin-top: 5px; text-transform: uppercase; letter-spacing: 0.06em; }
.main-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 14px; margin-bottom: 14px; }
.bottom-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 14px; }
.card { background: #fff; border: 1px solid #ebebeb; border-radius: 14px; padding: 18px 20px; }
.card-title { font-size: 13px; font-weight: 600; color: #0f0f11; }
.card-sub { font-size: 11px; color: #a8a8b8; margin-top: 2px; }
.kpi-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
.kpi { background: #f4f4f7; border-radius: 9px; padding: 12px 14px; }
.kpi-val { font-size: 18px; font-weight: 700; color: #0f0f11; letter-spacing: -0.5px; }
.kpi-lbl { font-size: 10px; color: #a8a8b8; text-transform: uppercase; letter-spacing: 0.05em; margin-top: 3px; }
.seg-item { margin-bottom: 12px; }
.seg-top { display: flex; justify-content: space-between; margin-bottom: 5px; font-size: 12px; }
.seg-track { height: 6px; background: #f4f4f7; border-radius: 99px; overflow: hidden; }
.seg-fill { height: 100%; border-radius: 99px; }
.seg-sub { font-size: 10px; color: #a8a8b8; margin-top: 3px; }
.act-row { display: flex; align-items: center; gap: 12px; padding: 10px 0; border-bottom: 1px solid #f0f0f4; }
.act-row:last-child { border-bottom: none; }
.act-icon { width: 32px; height: 32px; border-radius: 9px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.act-title { font-size: 12px; font-weight: 500; color: #0f0f11; }
.act-sub { font-size: 11px; color: #a8a8b8; margin-top: 1px; }
.dot-pulse { width: 7px; height: 7px; border-radius: 50%; background: #1d9e75; display: inline-block; animation: pulse 2s infinite; }
@keyframes pulse { 0%,100%{opacity:1}50%{opacity:.4} }
@media (max-width: 900px) { .main-grid, .bottom-grid { grid-template-columns: 1fr; } .stats-row { grid-template-columns: 1fr 1fr; } }
</style>

<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
    <div>
        <h2 style="font-size:20px;font-weight:700;color:#0f0f11;letter-spacing:-0.4px;">Overview</h2>
        <p style="font-size:12px;color:#a8a8b8;margin-top:2px;">{{ now()->format('F j, Y') }} — All stores</p>
    </div>
    <div style="display:flex;align-items:center;gap:8px;">
        <span style="display:flex;align-items:center;gap:6px;background:#fff;border:1px solid #ebebeb;border-radius:99px;padding:6px 12px;font-size:12px;color:#6b6b7b;">
            <span class="dot-pulse"></span> Live data
        </span>
    </div>
</div>

<div class="stats-row">
    <div class="sc">
        <div class="sc-bar" style="background:#5b4cf5;"></div>
        <div class="sc-top">
            <div class="sc-icon" style="background:#eeecfe;">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"><circle cx="8.5" cy="5.5" r="3.2" stroke="#5b4cf5" stroke-width="1.4"/><path d="M2 15c0-3.3 2.9-6 6.5-6s6.5 2.7 6.5 6" stroke="#5b4cf5" stroke-width="1.4" stroke-linecap="round"/></svg>
            </div>
            <span class="badge up">↑ 12%</span>
        </div>
        <div class="sc-val">{{ number_format($users) }}</div>
        <div class="sc-lbl">Total users</div>
    </div>
    <div class="sc">
        <div class="sc-bar" style="background:#1d9e75;"></div>
        <div class="sc-top">
            <div class="sc-icon" style="background:#e1f5ee;">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"><rect x="2.5" y="4.5" width="12" height="9" rx="1.5" stroke="#1d9e75" stroke-width="1.4"/><path d="M5.5 4.5V3.5a3 3 0 016 0v1" stroke="#1d9e75" stroke-width="1.4"/></svg>
            </div>
            <span class="badge up">↑ 5 new</span>
        </div>
        <div class="sc-val">{{ number_format($products) }}</div>
        <div class="sc-lbl">Products</div>
    </div>
    <div class="sc">
        <div class="sc-bar" style="background:#e8622a;"></div>
        <div class="sc-top">
            <div class="sc-icon" style="background:#fdf0eb;">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"><rect x="1.5" y="3.5" width="14" height="10" rx="1.5" stroke="#e8622a" stroke-width="1.4"/><path d="M4.5 8h8M4.5 11h5" stroke="#e8622a" stroke-width="1.3" stroke-linecap="round"/></svg>
            </div>
            <span class="badge dn">↓ 3%</span>
        </div>
        <div class="sc-val">{{ number_format($orders) }}</div>
        <div class="sc-lbl">Orders</div>
    </div>
    <div class="sc">
        <div class="sc-bar" style="background:#d4870f;"></div>
        <div class="sc-top">
            <div class="sc-icon" style="background:#fef3e0;">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"><circle cx="8.5" cy="8.5" r="6" stroke="#d4870f" stroke-width="1.4"/><path d="M8.5 5v7M6 6.5S6.5 5 8.5 5s3.3 1.5 1.5 3-3.3 1.5-3.3 3.2S8.5 13 8.5 13s2.3-.5 2.3-2.2" stroke="#d4870f" stroke-width="1.3" stroke-linecap="round"/></svg>
            </div>
            <span class="badge up">↑ 18%</span>
        </div>
        <div class="sc-val">{{ $revenue }}</div>
        <div class="sc-lbl">Revenue</div>
    </div>
</div>

<div class="main-grid">
    <div class="card">
        <div style="display:flex;justify-content:space-between;margin-bottom:14px;">
            <div><div class="card-title">Revenue over time</div><div class="card-sub">Monthly performance</div></div>
            <div style="display:flex;gap:12px;font-size:11px;color:#6b6b7b;align-items:center;">
                <span style="display:flex;align-items:center;gap:4px;"><span style="width:8px;height:8px;border-radius:2px;background:#5b4cf5;display:inline-block;"></span>Revenue</span>
                <span style="display:flex;align-items:center;gap:4px;"><span style="width:8px;height:8px;border-radius:2px;background:#1d9e75;display:inline-block;"></span>Target</span>
            </div>
        </div>
        <div style="position:relative;width:100%;height:200px;">
            <canvas id="revenueChart"></canvas>
        </div>
    </div>
    <div class="card">
        <div style="margin-bottom:14px;"><div class="card-title">Traffic sources</div><div class="card-sub">This month</div></div>
        <div style="display:flex;align-items:center;gap:16px;margin-bottom:16px;">
            <div style="position:relative;width:90px;height:90px;flex-shrink:0;"><canvas id="donutChart"></canvas></div>
            <div style="display:flex;flex-direction:column;gap:8px;flex:1;">
                <div style="display:flex;align-items:center;gap:6px;font-size:12px;"><span style="width:10px;height:10px;border-radius:2px;background:#5b4cf5;"></span><span style="flex:1;color:#0f0f11;">Organic</span><b style="font-weight:600;color:#0f0f11;">48%</b></div>
                <div style="display:flex;align-items:center;gap:6px;font-size:12px;"><span style="width:10px;height:10px;border-radius:2px;background:#1d9e75;"></span><span style="flex:1;color:#0f0f11;">Direct</span><b style="font-weight:600;color:#0f0f11;">28%</b></div>
                <div style="display:flex;align-items:center;gap:6px;font-size:12px;"><span style="width:10px;height:10px;border-radius:2px;background:#e8622a;"></span><span style="flex:1;color:#0f0f11;">Referral</span><b style="font-weight:600;color:#0f0f11;">14%</b></div>
                <div style="display:flex;align-items:center;gap:6px;font-size:12px;"><span style="width:10px;height:10px;border-radius:2px;background:#d4870f;"></span><span style="flex:1;color:#0f0f11;">Paid</span><b style="font-weight:600;color:#0f0f11;">10%</b></div>
            </div>
        </div>
        <div style="height:1px;background:#f0f0f4;margin-bottom:14px;"></div>
        <div class="kpi-grid">
            <div class="kpi"><div class="kpi-val">3.4%</div><div class="kpi-lbl">Conv. rate</div><div style="font-size:11px;color:#0f6e56;margin-top:4px;">↑ 0.4pp</div></div>
            <div class="kpi"><div class="kpi-val">2m 14s</div><div class="kpi-lbl">Avg session</div><div style="font-size:11px;color:#0f6e56;margin-top:4px;">↑ 12s</div></div>
            <div class="kpi"><div class="kpi-val">41%</div><div class="kpi-lbl">Bounce rate</div><div style="font-size:11px;color:#b91c1c;margin-top:4px;">↑ 2%</div></div>
            <div class="kpi"><div class="kpi-val">$68</div><div class="kpi-lbl">Avg order</div><div style="font-size:11px;color:#0f6e56;margin-top:4px;">↑ $4</div></div>
        </div>
    </div>
</div>

<div class="bottom-grid">
    <div class="card">
        <div style="margin-bottom:14px;"><div class="card-title">Top categories</div><div class="card-sub">By revenue share</div></div>
        <div class="seg-item"><div class="seg-top"><span style="font-weight:500;">Electronics</span><span style="font-weight:600;">78%</span></div><div class="seg-track"><div class="seg-fill" style="width:78%;background:#5b4cf5;"></div></div><div class="seg-sub">$124,800 this month</div></div>
        <div class="seg-item"><div class="seg-top"><span style="font-weight:500;">Clothing</span><span style="font-weight:600;">54%</span></div><div class="seg-track"><div class="seg-fill" style="width:54%;background:#1d9e75;"></div></div><div class="seg-sub">$86,400 this month</div></div>
        <div class="seg-item"><div class="seg-top"><span style="font-weight:500;">Books</span><span style="font-weight:600;">37%</span></div><div class="seg-track"><div class="seg-fill" style="width:37%;background:#d4870f;"></div></div><div class="seg-sub">$59,200 this month</div></div>
        <div class="seg-item"><div class="seg-top"><span style="font-weight:500;">Home</span><span style="font-weight:600;">21%</span></div><div class="seg-track"><div class="seg-fill" style="width:21%;background:#e8622a;"></div></div><div class="seg-sub">$33,600 this month</div></div>
    </div>
    <div class="card">
        <div style="margin-bottom:14px;"><div class="card-title">Orders this week</div><div class="card-sub">Daily breakdown</div></div>
        <div style="position:relative;width:100%;height:150px;margin-bottom:12px;"><canvas id="ordersChart"></canvas></div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;">
            <div class="kpi"><div class="kpi-val">238</div><div class="kpi-lbl">Today</div><div style="font-size:11px;color:#0f6e56;margin-top:4px;">↑ best day</div></div>
            <div class="kpi"><div class="kpi-val">192</div><div class="kpi-lbl">Daily avg</div><div style="font-size:11px;color:#0f6e56;margin-top:4px;">↑ 14 vs last wk</div></div>
        </div>
    </div>
    <div class="card">
        <div style="margin-bottom:14px;"><div class="card-title">Recent activity</div><div class="card-sub">Last 6 hours</div></div>
        <div class="act-row"><div class="act-icon" style="background:#eeecfe;"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"><circle cx="7.5" cy="5" r="2.8" stroke="#5b4cf5" stroke-width="1.3"/><path d="M1.5 13c0-2.8 2.7-5 6-5s6 2.2 6 5" stroke="#5b4cf5" stroke-width="1.3" stroke-linecap="round"/></svg></div><div style="flex:1;"><div class="act-title">New user registered</div><div class="act-sub">ali@example.com</div></div><div style="font-size:11px;color:#a8a8b8;">2m</div></div>
        <div class="act-row"><div class="act-icon" style="background:#e1f5ee;"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"><path d="M2 5l5.5 4.5L13 5" stroke="#1d9e75" stroke-width="1.3" stroke-linecap="round"/><rect x="1" y="3" width="13" height="9" rx="1.5" stroke="#1d9e75" stroke-width="1.3"/></svg></div><div style="flex:1;"><div class="act-title">Order #1042 completed</div><div class="act-sub">$148.00 · 3 items</div></div><div style="font-size:11px;color:#a8a8b8;">14m</div></div>
        <div class="act-row"><div class="act-icon" style="background:#fef3e0;"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"><path d="M7.5 2v4M7.5 9v.5" stroke="#d4870f" stroke-width="1.5" stroke-linecap="round"/><circle cx="7.5" cy="7.5" r="6" stroke="#d4870f" stroke-width="1.3"/></svg></div><div style="flex:1;"><div class="act-title">Low stock alert</div><div class="act-sub">Wireless Headphones — 3 left</div></div><div style="font-size:11px;color:#a8a8b8;">1h</div></div>
        <div class="act-row"><div class="act-icon" style="background:#fdecea;"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"><path d="M4 4l7 7M11 4l-7 7" stroke="#b91c1c" stroke-width="1.3" stroke-linecap="round"/></svg></div><div style="flex:1;"><div class="act-title">Order #1038 cancelled</div><div class="act-sub">Refund initiated · $56.00</div></div><div style="font-size:11px;color:#a8a8b8;">5h</div></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
const gc = 'rgba(0,0,0,0.05)';
const tc = 'rgba(0,0,0,0.35)';

new Chart(document.getElementById('revenueChart'), {
  type: 'line',
  data: {
    labels: ['Oct','Nov','Dec','Jan','Feb','Mar','Apr'],
    datasets: [
      { label:'Revenue', data:[18400,22100,31500,19800,24300,27600,30100], borderColor:'#5b4cf5', borderWidth:2, pointBackgroundColor:'#5b4cf5', pointRadius:3, tension:0.4, fill:false },
      { label:'Target', data:[20000,21000,25000,21000,23000,25000,28000], borderColor:'#1d9e75', borderWidth:1.5, borderDash:[5,4], pointRadius:0, tension:0.4, fill:false }
    ]
  },
  options: {
    responsive:true, maintainAspectRatio:false,
    plugins:{ legend:{display:false}, tooltip:{ callbacks:{ label: ctx => ' $' + ctx.parsed.y.toLocaleString() } } },
    scales:{
      x:{ grid:{display:false}, ticks:{color:tc,font:{size:11}}, border:{display:false} },
      y:{ grid:{color:gc}, ticks:{color:tc,font:{size:11},callback:v=>'$'+Math.round(v/1000)+'k'}, border:{display:false} }
    }
  }
});

new Chart(document.getElementById('donutChart'), {
  type:'doughnut',
  data:{ labels:['Organic','Direct','Referral','Paid'], datasets:[{ data:[48,28,14,10], backgroundColor:['#5b4cf5','#1d9e75','#e8622a','#d4870f'], borderWidth:0 }] },
  options:{ responsive:true, maintainAspectRatio:false, cutout:'72%', plugins:{ legend:{display:false} } }
});

new Chart(document.getElementById('ordersChart'), {
  type:'bar',
  data:{
    labels:['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
    datasets:[{ data:[168,195,182,210,174,148,238], backgroundColor:(ctx)=>ctx.dataIndex===6?'#5b4cf5':'rgba(0,0,0,0.07)', borderRadius:6, borderSkipped:false, barPercentage:0.6 }]
  },
  options:{
    responsive:true, maintainAspectRatio:false,
    plugins:{ legend:{display:false} },
    scales:{
      x:{ grid:{display:false}, ticks:{color:tc,font:{size:10}}, border:{display:false} },
      y:{ grid:{color:gc}, ticks:{color:tc,font:{size:10}}, border:{display:false} }
    }
  }
});
</script>

@endsection