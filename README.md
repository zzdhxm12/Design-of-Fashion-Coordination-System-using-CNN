# Design-of-Fashion-Coordination-System-using-CNN

Deep Learning 기술 중 하나인 CNN(Convolutional Neural Networks)을 사용하여 사용자로부터 입력받은 패션 아이템의 특징(색상, 상/하의 구분)을 추출하여 해당 패션 아이템과 어울리는 패션을 코디네이션해주는 시스템을 개발하였다.


## 개발 환경

#### CNN 모델 
- ubuntu16.04
- cuda8.0
- cundnn5.1
- tensorflow1.6.0


#### 웹 서버
- html
- MySQL
- PHP


## Architecture

### 1. 전체 구조도

![image](https://user-images.githubusercontent.com/53864655/72071935-3e9aca80-3330-11ea-9d66-095121c5a036.png)

**(1)** 사용자가 웹에서 의상 이미지 입력하여 서버로 전달한다.

**(2)** 서버는 CNN 모델을 실행하여 입력된 이미지의 특징 추출하여 특징 태그를 획득한다.

**(3)** CNN 모델은 획득한 특징 태그를 서버로 전달한다.

**(4)** 서버는 전달받은 특징 태그를 데이터베이스로 전달한다.

**(5)** 데이터베이스는 특징 태그와 가장 잘 어울리는 의상을 검색하여 추천 의상 이미지 서버로 전달한다.

**(6)** 서버는 전달 받은 추천 의상 이미지를 웹으로 전송하여 출력한다.


### 2. Database 설계

![image](https://user-images.githubusercontent.com/53864655/72071438-22e2f480-332f-11ea-8f46-410cf2df6318.png)

* **관계형 데이터베이스 스키마 설계**
``` 
Create table recommend (
 id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
 input varchar(300),
 output varchar(300),
 img varchar(300)
); 
```

![image](https://user-images.githubusercontent.com/53864655/72071461-342c0100-332f-11ea-9e28-cf9909602e18.png)

* id : Data의 고유 번호
* input : 사용자가 입력한 패션 아이템
* output : input과 어울리는 패션 아이템
* img : output의 이미지 경로


## CNN(Convolutional Neural Networks)

* **CNN 모델 구조**

![image](https://user-images.githubusercontent.com/53864655/72241451-40afa280-362a-11ea-939c-5a27b7eb0bb5.png)

* **객체 인식 과정**

![image](https://user-images.githubusercontent.com/53864655/72241455-4311fc80-362a-11ea-8177-9d057714f9c7.png)

CNN은 신경망에 기존의 필터 기술을 병합해 신경망이 2차원 영상을 잘 습득할 수 있도록 최적화한 알고리즘이다. CNN은 크게 convolution-pooling layer와 fully connected layer의 두 부분으로 구성되어 있다. 두 부분은 각각 입력된 이미지로부터 계층적 구조의 특징을 추출하는 역할과 추출된 특징을 입력받아 특정 카테고리로 분류하는 역할을 담당한다.


## Dataset

![image](https://user-images.githubusercontent.com/53864655/72070816-bfa49280-332d-11ea-8abe-00e43af60a69.png)

![image](https://user-images.githubusercontent.com/53864655/72071505-486ffe00-332f-11ea-8a0b-68ffe04590ac.png) 

각 카테고리 당 약 1000-3000개의 훈련 데이터와 200-500개의 테스트 데이터를 이용하였다. 학습에 사용된 이미지는 구글과 네이버에서 각 카테고리 별로 이미지 크롤링을 수행하는 파이썬 오픈소스 코드를 사용하여 수집하였다. 크롤링을 통하여 수집된 이미지 중 학습에 방해가 될 만한 이미지들은 제거한 후 각 이미지들에 대한 레이블링을 수행하였다. 

## Result

![image](https://user-images.githubusercontent.com/53864655/72070871-e1057e80-332d-11ea-9abe-f1e83cbe6b4b.png)

학습은 총 5,000번 반복하여 실행하였으며 최종적으로 카테고리 별로 의류를 분류하는 정확도가 95%의 모델을 생성하였다.

## Usecase

### 1. 시작페이지

![image](https://user-images.githubusercontent.com/53864655/72302062-2d451b80-36ac-11ea-83a9-e99eba389b65.png)

### 2. 버튼

![image](https://user-images.githubusercontent.com/53864655/72302071-33d39300-36ac-11ea-8c06-e966ece74ab2.png)

* HOME : 메인 페이지로 페이지 재로딩한다.
* RECOMMENDATION : 패션 추천 서비스 페이지로 이동한다.
* DETAIL : 추천 의상 상세 페이지로 이동한다.

### 3. 패션 추천 서비스 페이지

* 전체 UI

![image](https://user-images.githubusercontent.com/53864655/72302073-359d5680-36ac-11ea-8fdd-cb3636e15976.png)

* 패션 아이템 이미지 입력

![image](https://user-images.githubusercontent.com/53864655/72302083-4057eb80-36ac-11ea-905a-d7fc2b105921.png)

* 이미지 판별

![image](https://user-images.githubusercontent.com/53864655/72302087-44840900-36ac-11ea-9e54-808c915c5a2f.png)

* 패션 아이템 추천

![image](https://user-images.githubusercontent.com/53864655/72302090-464dcc80-36ac-11ea-9622-fe3dac0b77d2.png)

### 4. 추천 의상 이미지 상세 페이지

* 전체 UI

![image](https://user-images.githubusercontent.com/53864655/72302095-48b02680-36ac-11ea-94b0-69defb8eec22.png)

* 자세히 보기

![image](https://user-images.githubusercontent.com/53864655/72302097-4b128080-36ac-11ea-8113-6214531e8dbc.png)


