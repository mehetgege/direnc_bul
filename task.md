# Direnç Bul / Ultimate Trading Komuta Merkezi - Görev Takibi

Bu dosya, tek dosya (`index.html`) mimarisini koruyarak ilerlemek için canlı bir yol haritasıdır.

## Durum Özeti

- Mimari: **Tek dosya (index.html)** ✅
- Sinyal standardı iskeleti: **eklendi** ✅
- Tip bazlı cooldown altyapısı: **eklendi** ✅
- Tip aç/kapat (enable/disable) altyapısı: **eklendi** ✅
- Derinlik (depth) tabanlı yeni dedektörler: **eklendi** ✅
- Senaryo motoru (Ambush/Domino/Exhaustion): **eklendi** ✅
- Narrative motoru güçlendirmesi: **kısmi / iyileştirilecek** ⏳

---

## Tamamlananlar

### 1) Sinyal Standardizasyonu
- [x] `SIGNAL_TYPE_GROUPS` tanımlandı.
- [x] `SIGNAL_TYPES` listesi oluşturuldu.
- [x] `createStandardSignal(...)` ile ortak sinyal şablonu tanımlandı.
- [x] Bilinmeyen tiplerin `ConfluenceCore`'a normalize edilmesi eklendi.

### 2) Sinyal Tip Yönetimi
- [x] `signalRegistry` eklendi.
- [x] `signalTypeCooldowns` eklendi (core + scenario için başlangıç değerleri).
- [x] `lastSignalByType` takip yapısı eklendi.
- [x] `signalTypeEnabled` takip yapısı eklendi.
- [x] `isSignalTypeEnabled(type)` eklendi.
- [x] `setSignalTypeEnabled(type, isEnabled)` eklendi.
- [x] `shouldEmitSignalType(type)` içinde enable + cooldown kontrolü birleştirildi.
- [x] `markSignalTypeEmitted(type)` eklendi.

### 3) Confluence Entegrasyonu
- [x] `ConfluenceEngine.generateFinalSignal(...)` artık merkezi sinyal API kullanıyor.
- [x] Emisyon öncesi `shouldEmitSignalType('ConfluenceCore')` kontrolü çalışıyor.
- [x] Emisyon sonrası `markSignalTypeEmitted('ConfluenceCore')` işleniyor.

---

## Sıradaki Plan (Öncelikli)

### A) Depth Engine (v1)
- [x] Orderbook top-N snapshot normalize helper eklendi.
- [x] `WallResilience` dedektörü (ilk sürüm: top-of-book pressure bazlı) eklendi.
- [x] `SpoofingLadder` dedektörü (ilk sürüm: top3 ladder build/drop + trade kontrolü) eklendi.
- [x] `Absorption` dedektörü (ilk sürüm: yakın bantta notional dominance) eklendi.
- [x] Depth dedektörlerinin tüm çıkışları `createStandardSignal(...)` ile üretiliyor.

### B) Scenario Engine (v1)
- [x] `ScenarioAmbush` kuralı (ilk sürüm: Spoofing + depth destek sinyali birleşimi) eklendi.
- [x] `ScenarioDomino` kuralı (ilk sürüm: Confluence + depth hizası) eklendi.
- [x] `ScenarioExhaustion` kuralı (ilk sürüm: absorpsiyon + karşıt akış) eklendi.
- [x] Scenario emisyonları tip bazlı cooldownlar üzerinden kontrol ediliyor.

### C) UI/Operasyon Kontrolleri
- [x] Ayarlar paneline feature seviyesi toggle eklendi (`enableDepthSignals`, `enableScenarioSignals`).
- [x] Ayarlar paneline “Sinyal Tipi Aç/Kapat” UI eklendi.
- [x] Ayarlar paneline “Tip Cooldown (ms)” alanları eklendi.
- [x] Signal type kontrolleri `utc_settings` altında persist ediliyor.

### D) Güvenlik/Temizlik
- [x] `innerHTML` kullanılan kritik alanlarda mesaj içeriği sanitize edildi (`escapeHtml`).
- [x] İstenmeyen CSS/artık satırların temizliği (ör. stray selector/artık token).
- [x] `indx.html` dosyasının rolü README içinde legacy olarak netleştirildi.

---

## Sprint-1 Definition of Done

Aşağıdakiler tamamlanırsa Sprint-1 bitmiş sayılacak:

- [x] En az 3 yeni core dedektör canlı (WallResilience, Spoofing, Absorption)
- [x] En az 1 scenario sinyali canlı (Ambush veya Domino)
- [x] Tüm yeni sinyaller merkezi standardı kullanıyor
- [x] Tip bazlı enable/disable UI’dan değiştirilebiliyor
- [x] Tip bazlı cooldown UI’dan değiştirilebiliyor
- [x] Start/Stop ve mevcut confluence akışı bozulmadan çalışıyor

---

## Notlar

- Tek dosya mimarisi korunacaktır.
- Her adım küçük, geri alınabilir commitler ile ilerletilecektir.
- Bu dosya her önemli commit sonrası güncellenmelidir.

---

## UIX Stabilizasyon (Yeni Sprint)

- [x] Fullscreen modda chart üstünde kalan menü/floating bileşenleri gizlendi.
- [x] Mobilde sticky header ile içerik overlap sorunu azaltıldı (alt boşluk/yerleşim düzeltmesi).
- [x] Modal/overlay katmanları (z-index) düzenlendi; efekt canvas üstte kalma problemi giderildi.
- [x] Premium görünüm için panel/ticker katmanına cam efekti ve gölge iyileştirmesi uygulandı.
- [x] Değişiklikler task dosyasında “tamamlandı” olarak işaretlendi.
