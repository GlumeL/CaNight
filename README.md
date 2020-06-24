# CaNight
 **一款适配handsome主题的夜间插件**

#### 前言

插件名`CaNight`--我起名字很随意的，只适配`handsome`主题，我个人很满意
为什么分享出来，怎么做的，什么原因，什么用处
**原因**:哪当然是有小伙伴问我要这个夜间模式插件了！
**过程**:借鉴了大佬的模板，进行修改
**原因**:先前先是买的宝硕的夜间插件，但是觉得功能多，而且不适配我修改过的主题，然后就自己动手了。
**用处**:handsome主题的夜间模式，黑的自然，对插件进行了很多微小细节调整，适配阅读模式。
具体的话可以看一下本站的夜间模式-- https://www.bsgun.cn/1

由于本站对主题进行了多次修改，具体可看无修改的主题适配--http://cs.bsgun.cn/

#### 展示


![时光机][1] ![留言板][2] ![归档][3] ![主页][4] ![友链][5] ![相册][6] 

##### 关于微调

 - 去除常见的跟随系统模式
 - 适配阅读模式，阅读更护眼
 - 去除非夜间模式时间手动切换夜间模式，刷新页面后还是夜间模式。
 - 微调了短代码条，微调了表情背景，微调了多个自带页面,闲言碎语，音乐，搜索
 - 因是根据我修改过的主题进行适配的，原生主题或者修改过的主题可能会有部分bug。
 - 对`CodePrettify`代码高亮插件进行了适配，当然也适配了自带的主题代码样式,如下，切换会根据插件进行调整


主题代码块样式

    #include<stdio.h>
    int main()
    {
    printf("Hello word\n");
    return 0;
    }

插件代码块样式
```C
#include<stdio.h>
int main()
{
printf("Hello word\n");
return 0;
}
```


##### 关于设置

默认`22`点自动进入夜间模式，`6`点退出，不会根据系统模式加载
如想24小时使其为夜间模式可把时间都设置为`0`
手机端切换按钮后会在`LOGO`旁边生成按钮，也可选择不显示


##### 食用

**严格按照食用说明步骤来，很简单**
**1.下载本插件，上传解压放到usr/plugins/目录中**
**2.文件夹名改为CaNight，注意大小写**
**3.登录管理后台，激活插件**
**4.设置你喜欢的模式，至此，感谢你的使用**





[1]: https://cdn.jsdelivr.net/gh/catalpablog/Public/usr/uploads/2020/06/1.png
[2]: https://cdn.jsdelivr.net/gh/catalpablog/Public/usr/uploads/2020/06/2.png
[3]: https://cdn.jsdelivr.net/gh/catalpablog/Public/usr/uploads/2020/06/3.png
[4]: https://cdn.jsdelivr.net/gh/catalpablog/Public/usr/uploads/2020/06/4.png
[5]: https://cdn.jsdelivr.net/gh/catalpablog/Public/usr/uploads/2020/06/5.png
[6]: https://cdn.jsdelivr.net/gh/catalpablog/Public/usr/uploads/2020/06/6.png