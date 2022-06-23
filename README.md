# 111年度資料庫程式設計作業

## 投票 / 問卷系統
**請建立一個投票或問卷系統可以提供投票或問卷功能，並能查看結果**

### 動作要求
1. 網頁共用部分
    * 主畫面切割為上下兩塊及左小右大兩塊，共四塊組成。
        * 上方為標題圖片及選單列。
        * 中左為會員登入狀態及日期時間。
        * 中右為主要內容區
        * 下方為公司名稱及頁尾版權宣告或聯絡方式。
    * 選單列有以下內容
        * 回首頁
        * 投票列表按鈕
        * 後台管理

2. 網頁結構
    * 網頁分為三大類
        * 首頁 : 無論是否有會員身分、何目的都是從首頁進入在進行後續操作。
        * 前端部分 : 主要是給使用者檢視、新增、修改、刪除投票內容及結果展示。
        * 後端部分 : 針對前端部分使用者的需求做出相對應的動作，再將結果回傳呈現到前端。



3. 設計相關資料表
    * 資料表一(資料表名)
        |欄位名|資料型態|主鍵|預設值|自動遞增|備註|
        |---|---|---|---|---|---|
        |||||||
        |||||||
    * 資料表二(資料表名)
        |欄位名|資料型態|主鍵|預設值|自動遞增|備註|
        |---|---|---|---|---|---|
        |||||||
        |||||||
    
3. 請充分運用學到的各項網頁知識來美化這個投票系統的畫面
    * html標籤的應用(語意標籤、表單、表格、分隔線、標頭..etc)
    * css的應用(行內、內嵌、外連、flexbox、偽元素、動畫..etc)
    * bootstrap的應用(排版功能、元件、類別..etc)
    * javascript or jQuery的應用(DOM的操作、CSS的切換)

4. 請上傳至220的伺服器個人空間，並自行建立所需資料表
   
5. 請將完成品前後台及功能截圖五張放在ScreenShot資料夾下


### 必備要求
**後台功能**
* 請設計一個頁面可以用來輸入投票的題目
* 可以控制題目的啟用與關閉

**前台功能**
* 請設計一個頁面可以看到目前進行投票的項目
* 可以進行投票
* 請設計一個頁面可以看到投票統計的結果

**進階功能**
* 請整合註冊及登入系統
* 能以長條圖或圖像化的方式來呈現統計的結果
* 能判斷使用者的狀態，避免重覆投票

## 評量時間
2022-07-15(星期五)